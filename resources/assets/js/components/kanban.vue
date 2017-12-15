<template>
   <div>
       <div class="row">
          <div class="col-md-3" v-for="(tasks, status) in kanban">
              <div class="panel panel-default">
                  <div class="panel-heading">{{status}}</div>
                  <draggable :id="status" class="panel-body" v-model="kanban[status]" :options="dragOptions"  @end="dragTask">
                      <div :id="task.id" class="panel" v-for="task in tasks">
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
                axios.get('/tasks?order_by=status').then(response => {
                    this.kanban = response.data;
                });
            },
            dragTask(event) {
                if (event.from.id !== event.to.id) {
                    console.log('atualizar status task [path] = ' + event.item.id);
                }
            },
        },
    }
</script>

<style>
    .ghost {
        opacity: .5;
    }
</style>
