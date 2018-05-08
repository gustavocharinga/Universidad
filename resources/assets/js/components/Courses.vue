<template>
    <div class="container">
        <div class="col-md-1"></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Codigo Curso</th>
                <th>Curso</th>
                <th>Creditos</th>
                <th>Prelacion</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="courses in courses.data" :key="courses.id">
                <td class="heading" name="code" align="center">{{courses.code_course}}</td>
                <td class="heading" name="course"> {{courses.course}}</td>
                <td class="heading" name="creditos">{{courses.creditos}}</td>
                <td class="heading" name="materia prelante" v-on:load="find_pre(courses)">{{prelacion.code_course}}</td>
            </tr>
            </tbody>
        </table>
        <div align="center">
            <ul class="pagination">
                <li v-if="courses.current_page > 1">
                    <a href="javascript:void(0)" aria-label="Previous"
                       v-on:click.prevent="getCursos(courses.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in courses.last_page" :class="{'active': page == courses.current_page}">
                    <a href="javascript:void(0)" v-on:click.prevent="getCursos(page)">{{ page }}</a>
                </li>
                <li v-if="courses.current_page < courses.last_page">
                    <a href="javascript:void(0)" aria-label="Next"
                       v-on:click.prevent="getCursos(courses.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import VuePaginator from '../../../../node_modules/vuejs-paginator';
    import VuePagination from '../../../../node_modules/vuejs-paginator-axios';

    export default {
        name: "courses",
        components: {
            VPaginator: VuePaginator,
            VuePagination
        },
        data() {
            return {
                courses: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                prelacion: {},
                errors:'',
                error:[],
                find:'',
            }
        },
        methods: {
            getCursos(page) {
                axios.get('http://localhost:8000/api/cursos?page=' + page).then(response => {
                    console.log('data: ', response.data.cursos.data);

                    console.log('page: ', response.data);
                    //this.course = response.data.cursos.data;
                    this.courses = response.data.cursos;

                }).catch(e => {
                    this.courses.current_page.push(courses.current_page);
                        this.errors.push(e)
                })
            },
            find_pre(courses) {
                let vm = this;
                //Vue.set(this, 'courses',id );
                alert(courses);
                console.log('probando: ',courses);
                //alert(this.courses.code_course);
                //alert($("td[name=code]").val());
                axios.post('/cursos/registrar-prelacion/:id',{id: courses} )
                    .then(response => {
                        alert(response.data.resultado[0].pivot.code_course_in);
                        vm.prelacion=response.data.resultado[0];
                        console.log('dataPrimordial: ',response.data.resultado);
                    })
                    .catch(p => {
                        //this.courses.current_page.push(courses.current_page),
                        alert(p);
                        vm.error.push(p)
                    });
            },
        },
        mounted() {
            this.getCursos();
            this.find_pre();
        },
    }
</script>

<style scoped>
    .heading {
        font-size: 15px;
    }

    tbody > tr:nth-child(odd) {

        background-color: #7BA7E1;

    }

    tbody > tr:nth-child(even) {

        background-color: #fbfbfb;

    }

    ul {
        margin-left: 40%;
        margin-right: 40%;
    }

    a {
        color: blue;
        font-style: oblique;
        font-weight: bold;
    }
</style>