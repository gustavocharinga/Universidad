<template>
    <div class="container">
        <div class="col-md-1"></div>
        <!--<div class="card col-md-2 col-md-2" style="width: 18rem;" v-for="course in course" :key="course">
            <div class="card-body">
                <h5 class="card-title">{{course.code_course}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{course.course}}</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="heading">{{course.creditos}}</p>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
            <div class="card col-md-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>-->

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Codigo Curso</th>
                <th>Curso</th>
                <th>Creditos</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="course in course" :key="course.id">
                <td class="heading" align="center">{{course.code_course}}</td>
                <td class="heading">{{course.course}}</td>
                <td class="heading">{{course.creditos}}</td>
            </tr>
            </tbody>
            <!--<ul class="pager">
                <li class="previous" v-show="pagination.previous">
                    <a class="page-scroll" v-on:click="fetchCoursePaginate('previous')" href="#">Previous</a>
                </li>
                <li class="next" v-show="pagination.next">
                    <a class="page-scroll" v-on:click="fetchCoursePaginate('next')" href="#">Next</a>
                </li>
            </ul>-->
        </table>
        <!--<v-paginator :options="options" :resource_url="resource_url" @update="updateResource"></v-paginator>-->
    </div>
</template>

<script>
    import VuePaginator from '../../../../node_modules/vuejs-paginator'
    export default {
        name: "courses",
        components: {
            VPaginator: VuePaginator
        },
        data() {
            return {
                course: {
                    code_course: '',
                    course: '',
                    creditos: ''
                },
                pagination: {},
                //courses:{},
                /*resource_url: 'http://localhost:8000/api/cursos?page=1',
                options: {
                    remote_data: 'nested.data',
                    remote_current_page: 'nested.current_page',
                    remote_last_page: 'nested.last_page',
                    remote_next_page_url: 'nested.next_page_url',
                    remote_prev_page_url: 'nested.prev_page_url',
                    next_button_text: 'Go Next',
                    previous_button_text: 'Go Back'
                }*/
            }
        },
        created() {
            axios.get('http://localhost:8000/api/cursos').then(response => {
                console.log('data: ', response.data.cursos.data);

                console.log('page: ',response.data);
                this.pagination=response.data;
                //this.course = response.data.cursos;
                this.course = response.data.cursos.data;
                $this.courses=response.data.cursos;

            }).catch(e => {
                this.errors.push(e)
            })
        },
        /*methods: {
            updateResource(pagination){
                this.courses = pagination.cursos;
            }
        }*/
    }
</script>

<style scoped>
    .heading{
        font-size: 15px;
    }
    tbody>tr:nth-child(odd) {

        background-color:#7BA7E1;

    }

    tbody>tr:nth-child(even) {

        background-color:#fbfbfb;

    }
</style>