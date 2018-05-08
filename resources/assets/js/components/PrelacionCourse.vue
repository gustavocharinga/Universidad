<template >
    <div align="center" v-on:load="getCursos()">
        <!-- Example single danger button -->
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
        <select v-model="course_pre">
            <option disabled value="">Please select one</option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
        </select>
        <!--<li v-if="courses.current_page > 1">
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
        <tr v-for="courses in courses.data" :key="courses.id">
            <td class="heading" align="center">{{courses.code_course}}</td>
            <td class="heading">{{courses.course}}</td>
            <td class="heading">{{courses.creditos}}</td>
        </tr>-->
        <!--<select v-model="course_in.course" v-on:click="getCursos(courses.current_page)">
            <option disabled value="">Please select one</option>
            <option v-for="courses in courses.data" :key="courses.id">{{courses.course}}</option>
        </select>-->
        <select v-model="course_in.course">
            <option disabled value="">Please select one</option>
            <!--<option v-for="course in course" :key="course.id">{{course.course}}</option>-->
        </select>
        <span>Selected: {{ course_pre.course }} - {{course_pre.code}}</span>
        <span>Selected: {{ course_in.course }} - {{course_in.code}}</span>
        <!--<div v-for="(value, key) in course">
            prueba
            {{ key }}: {{ value['{course}'] }}
        </div>-->
        <input id="id" name="id" v-bind:value="course_in.code"/>
        <button name="code_course" v-model="course_in.code" class="btn btn-primary" v-on:click.prevent="buscar()">Buscar</button>
        <button name="code_course" v-model="course_in.code" class="btn btn-primary" v-on:click.prevent="fetchEvents()">Buscar2</button>
            <!--<div v-for="(value, key) in course">
                <div v-for="(value) in course[key]">
                     {{ value['code_course']}} - {{value['course']}}
                </div>
                <!--{{ key }}: {{ value['code_course']}}-->
        <!---</div>-->
        <br/>
        <!--<p>{{prela.code_course}} - {{prela.course}}->
        {{ prela.course_prelacion[0].course }}</p>-->
    </div>
</template>

<script>
    export default {
        name: "PrelacionCourse",
        /*http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },*/
        props:['prela'],
        data() {
            return {

                course_pre: {
                    code:'',
                    course:''
                },
                course_in: {
                    code:'',
                    course:''
                },
                courses: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                course:[{
                    code_course:'',
                    course:''
                }],
                coursecompelte:[],
                jose:[{}],
                events:[]
            }
        },
        methods: {
            getCursos() {
                axios.get('http://localhost:8000/api/cursos').then(response => {
                    console.log('data: ', response.data.cursos.data);

                    console.log('page: ', response.data);
                    var i;
                    var parsedJSON;
                    for (i = 1; i <= response.data.cursos.last_page; i++) {
                        axios.get('http://localhost:8000/api/cursos?page=' + i).then(response => {
                            parsedJSON=response.data.cursos.data;
                            console.log('variableA: ',parsedJSON);
                            //parsedJSON = JSON.parse("parsedJSON");
                            console.log('variable: ',parsedJSON);
                            this.coursecompelte.push(parsedJSON);
                            //console.log('otro: ',this.coursecompelte);
                            //parsedJSON=JSON.parse(this.coursecompelte);

                        });
                        console.log('ultima: ',this.coursecompelte);
                        this.jose=this.coursecompelte;
                        console.log('pase a curso: ',this.jose);
                        parsedJSON = this.coursecompelte;
                        //console.log('ultimaB: ',parsedJSON);
                        //this.course = parsedJSON;
                        this.course = this.jose;
                    }
                    console.log('prueba: ',this.course);
                    //this.course = response.data.cursos.data;
                    //this.courses = response.data.cursos;

                }).catch(e => {
                    //this.courses.current_page.push(courses.current_page),
                        this.errors.push(e)
                })
            },
            buscar(){
                //this.editing=true;
                this.course_in.code = this.prela.course_prelacion[0].code_course;
                //let self = this;
                //id=this.course_in.code;
                axios.post('/cursos/registrar-prelacion/:id',{id: "II0324V1"} )
                    .then(response => {
                        alert(response.data.resultado[0].pivot.code_course_in);
                        console.log('dataPrimordial: ',response.data.resultado);
                    })
                    .catch(e => {
                    //this.courses.current_page.push(courses.current_page),
                        alert(e);
                    this.errors.push(e)
                })
                    /*axios({
                        method: 'POST',
                        url: 'cursos/registrar-prelacion',
                        data: {
                            id: this.course_in.code,
                        },

                    }).then((response) => {
                        //this.listarNO();
                        alert(response);
                        //do somethig to call method listarSi() on Amigos component

                    }).catch((error) => {
                        console.log(error);
                    });*/
                /*Event.$on('buscar', function (code_course) {

                    this.buscar(code_course);
                    alert(code_course);
                });*/
                //alert('hola '+ this.course_in.code);
            },
            fetchEvents : function(){
                let self = this;
                /*axios.get('cursos/registrar-prelacion')
                    .then(function (id) {
                        Vue.set(self , 'buscar', prelacion.data.data);
                    })
                    .catch(function (id) {
                        alert('error');
                    });*/
                axios.post('/cursos/registrar-prelacion',self.course_in.code).then(function(id){
                    alert(id);
                    self.events = id.data;
                    console.log('datas: ',id);
                    alert(self.events);
                },function (error){
                    console.log(error);
                });
            }
        },

        mounted() {
            this.getCursos();
            this.buscar();
            this.fetchEvents();
        },
    }
</script>

<style scoped>

</style>