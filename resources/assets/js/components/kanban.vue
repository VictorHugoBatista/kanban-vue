<template>
   <div>
       <div class="row">
          <div class="col-md-3" v-for="(tasks, status) in kanban">
              <div class="panel panel-default">
                  <div class="panel-heading">{{status}}</div>
                  <div class="panel-body">
                      <div class="panel" v-for="task in tasks">
                          {{task.name}}
                      </div>
                  </div>
              </div>
          </div>
       </div>
   </div>
</template>

<script>
    export default {
        data() {
            return {
                kanban: {},
            };
        },
        mounted() {
            this.updateKanban();
        },
        methods: {
            updateKanban() {
                axios.get('/tasks?order_by=status').then(response => {
                    this.kanban = response.data;
                });
            },
        },
    }
</script>
