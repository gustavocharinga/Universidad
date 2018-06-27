<template>
    <div class="container">
        <div class="col-md-1"></div>
        <table class="table table-striped" >
            <thead>
            <tr>
                <th>Codigo Curso</th>
                <th>Curso</th>
                <th>Creditos</th>
                <th>Prelacion</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="courses in courses.data" :key="courses.id" >
                <td class="heading" id="code" name="code" align="center" >{{courses.code_course}}</td>
                <td class="heading" name="course"> {{courses.course}}</td>
                <td class="heading" name="creditos">{{courses.creditos}}</td>
                <!--<td class="heading"  v-model="find=courses.code_course" v-bind:aria-selected="key" @dblclick="findPre(find)" >{{prelacion.code_course_in}}</td>
                <!--<td class="heading" v-if="active==1"></td>
                <td class="heading" v-for="pre in prelacion" v-if="active==0" v-show="courses.code_course==pre.pivot.code_course_in">
                    {{pre.code_course}}
                </td>:selected="find=courses.code_course"-->



            </tr>
            </tbody>
        </table>
        <!--{{find}}
        {{probando}}

        {{find}}-->
        <!--<div>
            <p v-for="a in find" :key="a.id">
                {{a}}
            </p>
        </div>-->
        <!--<div>
            <p v-for="pre in prelacion">
                {{pre.pivot.code_course_in}}
            </p>
        </div>-->
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
        props: ['pepe'],
        data() {
            return {
                courses: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                prelacion: [],
                errors: '',
                error: [],
                find: [
                    {code_course:'',data:''}
                ],
                //id:'hola',
                probando: [],
                active:1,
                //arr: [{id: ''}]
            }
        },
        methods: {
            /*addFind: function () {
                this.find.push({ value: '' });
            },*/
            getCursos(page) {
                let vm = this;
                axios.get('http://localhost:8000/api/cursos?page=' + page).then(response => {
                    console.log('data: ', response.data.cursos.data);

                    console.log('page: ', response.data);
                    //this.course = response.data.cursos.data;
                    vm.courses = response.data.cursos;
                    //console.log(response.data.cursos.data[0].code_course);
  /*                  response.data.cursos.data.forEach(function (element) {
                        console.log(element.code_course);
                        axios.post('/cursos/registrar-prelacion/:id', {id: element.code_course})
                            .then(response => {
                                //alert(response.data.resultado[0].pivot.code_course_in);

                                response.data.resultado.forEach(function (cursos) {
                                    vm.prelacion.push(cursos);
                                    console.log(cursos.code_course);
                                    vm.active=0;
                                });
                                //console.log('dataPrimordial: ', response.data.resultado[0]);
                            })
                    });
                    vm.active=1;
*/
                    //alert(response.data.cursos.data.length);
                }).catch(e => {
                    this.courses.current_page.push(courses.current_page);
                    this.errors.push(e)
                })
            },
            findPre: function (code_course) {
                //alert(code_course.target.value);
                //$emit('findPre', this.courses);
                let vm = this;
                //console.log('aaa: ',this.probando);
                //vm.probando=document.querySelector('#code');
               // alert(this.probando);
                //Vue.set(this, 'courses',id );
                alert(code_course);
                //console.log('probando: ', code_course);
                //alert(this.courses.code_course);
                //alert($("td[name=code]").val());
                //alert(this.courses.data);
                //console.log('ni idea: ',this.courses.data);
                axios.post('/cursos/registrar-prelacion/:id', {id:code_course})
                    .then(response => {
                        //alert(response.data.resultado[0].pivot.code_course_in);
                        //alert(response.data.resultado[0].code_course);
                        console.log(response.data);
                        console.log(response.data.resultado);
                        vm.prelacion = response.data.resultado[0];
                        //console.log('dataPrimordial: ', response.data.resultado);
                    })
                    .catch(p => {
                        //this.courses.current_page.push(courses.current_page),
                        alert(p);
                        vm.error.push(p)
                    });
            },
            cambio(){
                let vm=this;
                vm.active=1;

            }
        },
        created(){
            this.addFind();
            //var code_course;
            //var event = document.getElementById("code");
            //var code_course = event.target.value;
            //var code_course = document.target.value;

            //var code_course='hola';
            //const het = document.getElementById('code');
            //var code_course = het.querySelector('td[name=code]');
            //const code_course  = signupForm.querySelector('input[name=name]');
            //var tete = this.courses.code_course;
            this.findPre();
            this.cambio();
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