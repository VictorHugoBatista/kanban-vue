<template>
   <div>
       <div class="row">
          <div class="col-md-3" v-for="(tasks, status_id) in kanban">
              <div class="panel panel-default">
                  <div class="panel-heading">{{tasks['status_name']}}</div>
                  <draggable :id="status_id" class="panel-body" v-model="kanban[status_id]['tasks']" :options="dragOptions"  @end="dragTask">
                      <div :id="task.id" class="panel" v-for="task in tasks['tasks']">
                          {{task.name}}
                      </div>
                  </draggable>
              </div>
          </div>
       </div>
   </div>
</template>

<script>
    import draggable from 'vuedraggable';

    export default {
        components: {
            draggable,
        },
        data() {
            return {
                kanban: {},
            };
        },
        computed: {
            dragOptions() {
                return {
                    group: 'kanban',
                    ghostClass: 'ghost',
                };
            }
        },
        mounted() {
            this.updateKanban();
        },
        methods: {
            updateKanban() {
                axios.get('/tasks?group_by=status').then(response => {
                    this.kanban = response.data;
                });
            },
            dragTask(event) {
                if (event.from.id !== event.to.id) {
                    this.updateTaskStatus(event.item.id, event.to.id, data => {
                        this.kanban[event.to.id].tasks[event.newIndex] = data;
                    });
                }
            },
            updateTaskStatus(taskId, newStatus, done) {
                axios
                    .patch('/tasks/' + taskId, {'status_id': newStatus})
                        .then(response => done(response.data))
                        .catch(error => console.log(error));
            },
        },
    }
</script>

<style>
    .ghost {
        opacity: .5;
    }
</style>
