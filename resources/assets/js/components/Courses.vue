<template>
    <div class="container">
        <div class="col-md-1"></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Codigo Curso</th>
                <th>Curso</th>
                <th>Creditos</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="courses in courses.data" :key="courses.id">
                <td class="heading" align="center">{{courses.code_course}}</td>
                <td class="heading">{{courses.course}}</td>
                <td class="heading">{{courses.creditos}}</td>
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
                    this.courses.current_page.push(courses.current_page),
                        this.errors.push(e)
                })
            },
        },
        mounted() {
            this.getCursos();
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