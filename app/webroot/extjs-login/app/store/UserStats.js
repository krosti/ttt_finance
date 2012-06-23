Ext.define('LM.store.UserStats', {
 	extend: 'Ext.data.Store',

    model: 'LM.model.UsersStatsChart',
    data: [
        { temp: '58', date: new Date(2011, 1, 1, 8) },
        { temp: '63', date: new Date(2011, 1, 1, 9) },
        { temp: '73', date: new Date(2011, 1, 1, 10) },
        { temp: '78', date: new Date(2012, 1, 1, 11) },
        { temp: '181', date: new Date(2011, 1, 1, 12) }
    ]
});