<template>
   <div>
       <div class="row">
          <div class="col-md-3" v-for="(tasks, status) in kanban">
              <div class="panel panel-default">
                  <div class="panel-heading">{{status}}</div>
                  <div class="panel-body">
                      <draggable :options="dragOptions">
                          <div class="panel" v-for="task in tasks">
                              {{task.name}}
                          </div>
                      </draggable>
                  </div>
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
        },
    }
</script>
