var dashboardApp = new Vue({
  el: '#dashboard',
  data: {
    "name" : "Tapestry",
  "short_description": "Build a visualization layer for the project dashboard",
  "start_date" : "2018-07-01",
  "target_date" : "2018-11-03",
  "budget" : "4950000",
  "spent" : "3456700",
  "projected_spend": "4740500",
  "weekly_effort_target": 400,
  tasks: [
    {
      "id": 0,
      "title": '',
      "type" : '',
      "size" : '',
      "team" : '',
      "status": '',
      "start_date": '',
      "close_date": null,
      "hours_worked": '',
      "perc_complete": '',
      "current_sprint" : ''
    }
  ]
},
computed: {
  days_left: function() {
    //this.target_date
    return 31;
  }
},
methods: {
  pretty_date: function (d) {
    return d;
  },
  log (msg) {
    alert(msg);
  },
  fetchTasks() {
    fetch('https://raw.githubusercontent.com/tag/iu-msis/dev/public/p1-tasks.json')
    .then( response => response.json() )
    .then( function(json) {
      this.tasks = json;
      console.log(json);
    })
    .catch( function(err) {
      console.log('FETCH ERROR:');
      console.log(err);
    })
  },
  gotoTask(tid) {
    window.location = 'task.html?taskId=' +tid;
  }
},
created () {
  this.fetchTasks()
}
})
