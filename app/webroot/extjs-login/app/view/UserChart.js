Ext.define('LM.view.UserChart', {
	extend: "Ext.chart.Chart",
	renderTo: 'userchart',
	width: 400,
	height: 300,
	store: ['UserStats'],
	axes: [
        {
            title: 'User',
            type: 'Numeric',
            position: 'left',
            fields: ['temp'],
            minimum: 0,
            maximum: 100
        },
        {
            title: 'Time',
            type: 'Time',
            position: 'bottom',
            fields: ['date'],
            groupBy: 'hour',
            dateFormat: 'ga'
        }
    ],
    initComponent: function() {
    	this.callParent(arguments);
    }
});