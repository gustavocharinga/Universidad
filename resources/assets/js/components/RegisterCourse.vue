<template>
    <div>
        <form>
            <div v-if="step === 1">

                <h1>Step One</h1>
                <p>
                    <legend for="name">Your Name:</legend>
                    <input id="name" name="name" v-model="course.code_course">
                </p>

                <p>
                    <legend for="email">Your Email:</legend>
                    <input id="email" name="email" v-model="course.course">
                </p>

                <button @click.prevent="next()">Next</button>

            </div>

            <div v-if="step === 2">
                <h1>Step Two</h1>
                <p>
                    <legend for="street">Your Street:</legend>
                    <input id="street" name="street" v-model="course.description">
                </p>

                <p>
                    <legend for="city">Your City:</legend>
                    <input id="city" name="city" v-model="course.creditos">
                </p>

                <p>
                    <legend for="state">Your State:</legend>
                    <input id="state" name="state" v-model="registration.state">
                </p>

                <button @click.prevent="prev()">Previous</button>
                <button @click.prevent="next()">Next</button>

            </div>

            <div v-if="step === 3">
                <h1>Step Three</h1>

                <p>
                    <legend for="numtickets">Number of Tickets:</legend>
                    <input id="numtickets" name="numtickets" type="number" v-model="registration.numtickets">
                </p>

                <p>
                    <legend for="shirtsize">Shirt Size:</legend>
                    <select id="shirtsize" name="shirtsize" v-model="registration.shirtsize">
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">X-Large</option>
                    </select>
                </p>

                <button @click.prevent="prev()">Previous</button>
                <button @click.prevent="submit()">Save</button>

            </div>
        </form>
        <br/><br/>Debug: {{registration}}<br/><br/> debug: {{course}}
    </div>
</template>

<script>
    export default {
        name: "RegisterCourse",
        data() {
            return {
                step: 1,
                registration: {
                    name: null,
                    email: null,
                    street: null,
                    city: null,
                    state: null,
                    numtickets: 0,
                    shirtsize: 'XL'
                },
                course:{
                    code_course: '',
                    course:'',
                    description: '',
                    creditos: ''
                }
            }
        },
        methods: {
            prev() {
                this.step--;
            },
            next() {
                this.step++;
            },
            submit() {
                alert('Submit to blah and show blah and etc.');
                axios.post('http://localhost:8000/api/cursos', this.course).then(response => {
                    location.reload();
                }).catch(e => {
                        this.errors.push(e)
                    })
            },

        }

    }
</script>

<style scoped>

</style>