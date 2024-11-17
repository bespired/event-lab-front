<template>
    <div class="scroll-content">
        Calculation Life Cycle <br>

        Start calculation every 2 hours or is_changed > 500 or is_new > 500 (?)<br>

        <step-wrap step="1" label="collect">
            Create records in *results_write* for any
            `is_new` from tables with *accu_* as prefix. --

            Update records in *results_write* for any
            `is_changed` from tables with *accu_* as prefix. --

        </step-wrap>

        <step-wrap step="2" label="cleanup">
            Remove old prospects from *results_write* where profile is no contact and to old--
            Remove old prospects from *profiles* --
            (`DELETE t1 FROM Table1 t1 JOIN Table2 t2 ON t1.ID = t2.ID; ...?`) --
            (`DELETE FROM profiles WHERE is_contact=0 AND lastvisitdate ... ;`)
        </step-wrap>

        <step-wrap step="3" label="calculate">
            Calculate timeline in *results_write* for --
            - `accu_has_utms` based on attributes --
            - `accu_on_journeys` based on journeys --
        </step-wrap>

        <step-wrap step="3" label="calculate">
            Calculate accumulators in *results_write* for --
            - `accu_in_panels` based on panel query builders --
            - `accu_in_segments` based on panels and qualifier builders --
        </step-wrap>


        <step-wrap step="8" label="aggrigate">
            Aggrigate in today, this month and this year. --
        </step-wrap>

        <step-wrap step="8" label="roll-up">
            Swap *results_read* with *results_write* --
            (`RENAME TABLE results_read TO results_write, results_write To results_read;`) --

            In *results_write* set `collected` to "0" and `status` to "reset" --
        </step-wrap>

    </div>
</template>
