import Intercurrence from '@views/Intercurrence'

export default [
    {
        path: '/surgeries/manage/:surgery/start',
        name: 'events.start'
    },
    {
        path: '/surgeries/manage/:surgery/intercurrence',
        name: 'events.intercurrence',
        component: Intercurrence
    }
];
