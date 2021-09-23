<template>
    <div class="register-content">
        <form
            novalidate
            @submit.prevent="validateUser">
            <div class="fields">
                <md-field id="first-name"
                          :class="getValidationClass('firstName')">
                    <label>First Name</label>
                    <md-input
                        type="text"
                        v-model="form.firstName"
                        :disabled="sending"></md-input>
                    <span class="md-error" v-if="!$v.form.firstName.required">The first name is required</span>
                    <span class="md-error" v-else-if="!$v.form.firstName.minLength">Invalid first name</span>
                </md-field>

                <md-field id="last-name"
                          :class="getValidationClass('lastName')">
                    <label>Last Name</label>
                    <md-input
                        type="text"
                        v-model="form.lastName"
                        :disabled="sending"></md-input>
                    <span class="md-error" v-if="!$v.form.lastName.required">The last name is required</span>
                    <span class="md-error" v-else-if="!$v.form.lastName.minLength">Invalid last name</span>
                </md-field>

                <md-field id="username"
                          :class="getValidationClass('username')">
                    <label>Username</label>
                    <md-input
                        type="text"
                        v-model="form.username"
                        :disabled="sending"></md-input>
                    <span class="md-error" v-if="!$v.form.username.required">The username is required</span>
                    <span class="md-error" v-else-if="!$v.form.username.minLength">Invalid username</span>
                </md-field>

                <md-field id="email"
                          :class="getValidationClass('email')">
                    <label>Email</label>
                    <md-input
                        type="email"
                        v-model="form.email"
                        :disabled="sending"
                    ></md-input>
                    <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
                    <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
                </md-field>

                <md-field id="pass"
                          :class="getValidationClass('password')">
                    <label>Password</label>
                    <md-input
                        type="password"
                        v-model="form.password"
                        :disabled="sending"></md-input>
                    <span class="md-error" v-if="!$v.form.password.required">The password is required</span>
                    <span class="md-error" v-else-if="!$v.form.password.valid">Invalid password</span>
                    <span class="md-helper-text">Must contain: at least 12 characters,
                        uppercase and lowercase letters, numbers, and special
                        characters</span>
                </md-field>

                <md-field id="rep-pass"
                          :class="getValidationClass('confirmPassword')">
                    <label>Confirm Password</label>
                    <md-input
                        type="password"
                        v-model="form.confirmPassword"
                        :disabled="sending"></md-input>
                    <span class="md-error" v-if="!$v.form.confirmPassword.required">The confirmation password is required</span>
                    <span class="md-error" v-else-if="!$v.form.confirmPassword.sameAsPassword">The passwords do not match</span>
                    <span class="md-error" v-else-if="!$v.form.confirmPassword.valid">Invalid password</span>
                    <span class="md-helper-text">Must be the same as the password above</span>
                </md-field>
            </div>

            <md-button
                id="submit-btn"
                type="submit"
                class="md-raised md-primary"
                :disabled="sending"
            >Register</md-button>

<!--            <md-snackbar-->
<!--                :md-active.sync="userSaved"-->
<!--                :md-position="'center'"-->
<!--                :duration="4000"-->
<!--                md-persistent>-->
<!--                The user {{ currentUser }} was saved with success!-->
<!--            </md-snackbar>-->
        </form>
    </div>
</template>

<script>
import {validationMixin} from 'vuelidate'
import {email, minLength, maxLength, required, sameAs} from 'vuelidate/lib/validators'

export default {
    name: "Register",
    mixins: [validationMixin],
    validations: {
        form: {
            firstName: {
                required,
                minLength: minLength(3),
                maxLength: maxLength(35)
            },
            lastName: {
                required,
                minLength: minLength(3),
                maxLength: maxLength(35)
            },
            username: {
                required,
                minLength: minLength(6),
                maxLength: maxLength(20)
            },
            email: {
                required,
                email
            },
            password: {
                required,
                valid: function(value) {
                    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/
                        .test(value)
                }
            },
            confirmPassword: {
                required,
                sameAsPassword: sameAs('password'),
                valid: function(value) {
                    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/
                        .test(value)
                }
            }
        }
    },
    data: () => ({
        form:{
            firstName: null,
            lastName: null,
            username: null,
            email: null,
            password: null,
            confirmPassword: null,
        },
        userSaved: false,
        sending: false,
        newUser: null,
    }),
    methods: {
        getValidationClass (fieldName) {
            const field = this.$v.form[fieldName]

            if (field) {
                return {
                    'md-invalid': field.$invalid && field.$dirty
                }
            }
        },
        clearForm () {
            this.$v.$reset()
            this.form.firstName = null
            this.form.lastName = null
            this.form.username = null
            this.form.email = null
            this.form.password = null
            this.form.confirmPassword = null
        },
        saveUser() {
            this.sending = true

            window.setTimeout(() => {
                this.newUser = `${this.form.username}`
                this.userSaved = true
                this.sending = false
                this.clearForm()
            }, 1500)
        },
        validateUser () {
            this.$v.$touch()

            if (!this.$v.$invalid) {
                this.saveUser()
                this.$store.dispatch('auth/loadNewUser', this.form)
                this.$store.dispatch('auth/postUser')
            }
        }
    }
}
</script>

<style scoped>

.register-content {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.fields {
    margin: 10px 0 50px 0;
}

#rep-pass {
    margin-top: 50px;
}

#submit-btn {
    width: 100%;
}

</style>
