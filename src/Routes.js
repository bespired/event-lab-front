const Routes = {

    '/documentation':                 'docs/DocumentIndex',
    '/documentation/views':           'docs/ViewsIndex',
    '/documentation/tracker':         'docs/TrackerIndex',
    '/documentation/mail':            'docs/MailIndex',

    '/documentation/lifecycle':       'docs/CyclesCalculationLifeCycle',

    '/documentation/tracker/cycle':   'docs/TrackerLifeCycle',
    '/documentation/tracker/tracker': 'docs/TrackerGoogle',
    '/documentation/tracker/events':  'docs/TrackerEvents',
    '/documentation/tracker/tokens':  'docs/TrackerTokens',
    '/documentation/tracker/utm':     'docs/TrackerUtms',

    '/documentation/mail/pixel':      'docs/CyclesMailPixel',
    '/documentation/mail/clicked':    'docs/CyclesMailClicked',
    '/documentation/boxed':           'docs/ExampleConnect',

    '/documentation/views/dashboard': 'docs/ViewsDashboardPrototype',
    '/documentation/views/icons':     'docs/ViewIcons',

    '/documentation/development/frontend': 'docs/DevelopmentFrontend',


    '/visitors':   'views/VisitorView',
    '/visitors/*': 'views/VisitorView',

    '/messages': 'views/MessagesView',

    '/website/assets':   'views/AssetView',
    '/website/assets/*': 'views/AssetView',

    '/website/forms':   'views/FormView',
    '/website/forms/*': 'views/FormView',



}

export default Routes;
