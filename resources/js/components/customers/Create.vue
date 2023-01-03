<template>
    <div>
      <Navbar :user="user" />
  
      <Sidebar :user="user" />
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- <slot name="breadcrumbs"></slot> -->
        <!-- Main content -->
        <section class="content">
          <slot name="content"></slot>
        </section>
        <!-- /.content -->
  
          <div class="col-md-12 pt-5">
              <b-form @submit="onSubmit">
                  <div class="form-row " >
                      
                        <div class="form-group col-md-12" v-if="no_rfc" >
                            <div class="row">
                                <div class="col-md-3">
                                <label for="inputPassword4">RFC</label>
                                
                                <b-form-input
                                    v-model="form.rfc"
                                    id="inline-form-input-name"

                                    ></b-form-input>
                                </div>
                                <div class="col-md-3">   
                                    </br>
                                    <b-button v-on:click="type_customer" variant="primary">Continuar</b-button>
                                </div>
                            </div>
                        </div>
                      <div class="form-group col-md-3" v-else>
                        
                            <label for="inputPassword4">RFC</label>
                            <b-form-input
                                readonly
                                v-model="form.rfc"
                                id="inline-form-input-name"
                                ></b-form-input>
                      </div>
                      <div class="form-group col-md-3">
                        <b-form-group id="input-group-3" label="Tipo de persona" label-for="input-3" v-if="show">
                              <b-form-select
                              disabled
                              id="input-3"
                              v-model="form.type"
                              :options="types"
                              ></b-form-select>
                          </b-form-group>
                        </div>
                        <div class="form-group col-md-4" v-if="fisica">
                            <label for="inline-form-input-name">Nombre</label>
                            <b-form-input
                            v-model="form.name"
                            id="inline-form-input-name"
                            :class="hasError('name') ? 'is-invalid' : ''"
                            placeholder="Jane"
                            ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="fisica">
                            <label for="inputPassword4">Apellido paterno</label>
                            <b-form-input
                                v-model="form.first_lastname"
                                id="inline-form-input-name"
                                :class="hasError('first_lastname') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="fisica">
                            <label for="inline-form-input-name">Apellido materno</label>
                            <b-form-input
                            v-model="form.second_lastname"
                            id="inline-form-input-name"
                            :class="hasError('second_lastname') ? 'is-invalid' : ''"
                            placeholder="Jane"
                            ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="moral">
                            <label for="inputPassword4">Razón social</label>
                            <b-form-input
                                v-model="form.social_reason"
                                id="inline-form-input-name"
                                :class="hasError('social_reason') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Uso CFDI</label>
                            <b-form-input
                                v-model="form.uso_cfdi"
                                id="inline-form-input-name"
                                :class="hasError('uso_cfdi') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <b-form-group id="input-group-3" label="Estatus" label-for="input-3">
                                <b-form-select
                                id="input-3"
                                v-model="form.status"
                                :options="status"
                                required
                                ></b-form-select>
                            </b-form-group>
                        </div>
    
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Contacto</label>
                            <b-form-input
                                v-model="form.contact"
                                id="inline-form-input-name"
                                :class="hasError('contact') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Teléfono</label>
                            <b-form-input
                                v-model="form.phone"
                                id="inline-form-input-name"
                                :class="hasError('phone') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Celular</label>
                            <b-form-input
                                v-model="form.mobile"
                                id="inline-form-input-name"
                                :class="hasError('mobile') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Correo electrónico</label>
                            <b-form-input
                                v-model="form.email"
                                id="inline-form-input-name"
                                :class="hasError('email') ? 'is-invalid' : ''"
                                type="email"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-12" v-if="show">
                            <label for="inputPassword4">Observaciones</label>
                            <b-form-textarea
                                v-model="form.observations"
                                id="inline-form-input-name"
                                :class="hasError('observations') ? 'is-invalid' : ''"
                                type="textarea"
                                ></b-form-textarea>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Pais</label>
                            <b-form-input
                                v-model="form.country"
                                id="inline-form-input-name"
                                :class="hasError('country') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Estado</label>
                            <b-form-input
                                v-model="form.state"
                                id="inline-form-input-name"
                                :class="hasError('state') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Municipio</label>
                            <b-form-input
                                v-model="form.municipality"
                                id="inline-form-input-name"
                                :class="hasError('municipality') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Ciudad</label>
                            <b-form-input
                                v-model="form.city"
                                id="inline-form-input-name"
                                :class="hasError('city') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-2" v-if="show">
                            <label for="inputPassword4">Código postal</label>
                            <b-form-input
                                v-model="form.postal_code"
                                id="inline-form-input-name"
                                :class="hasError('postal_code') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword4">Colonia</label>
                            <b-form-input
                                v-model="form.suburb"
                                id="inline-form-input-name"
                                :class="hasError('suburb') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-3" v-if="show">
                            <label for="inputPassword3">Calle</label>
                            <b-form-input
                                v-model="form.street"
                                id="inline-form-input-name"
                                :class="hasError('street') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-2" v-if="show">
                            <label for="inputPassword4">No. exterior</label>
                            <b-form-input
                                v-model="form.ext_num"
                                id="inline-form-input-name"
                                :class="hasError('ext_num') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        <div class="form-group col-md-2" v-if="show">
                            <label for="inputPassword4">No. interior</label>
                            <b-form-input
                                v-model="form.int_num"
                                id="inline-form-input-name"
                                :class="hasError('int_num') ? 'is-invalid' : ''"
                                ></b-form-input>
                        </div>
                        
                        <div class="form-group col-md-12" v-if="show">
                            <b-button class="float-right" type="submit" variant="success">Crear</b-button>
                        </div>
                    <!-- <div class="form-group col-md-12">
                            <b-button class="float-right" v-on:click="type_customer" variant="primary">Continuar</b-button>
                        </div> -->
                  </div>
              </b-form>
          </div>
          <!-- <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre> -->
      </b-card>
      </div>
                  
      
  
        <!-- @click="onActionClicked('delete-item', props.rowData)" -->
      <Footer />
    </div>
  </template>
  
  <script>
  import Navbar from "../global/Navbar";
  import Sidebar from "../global/Sidebar";
  import Footer from "../global/Footer";
  
  import Vuetable from "vuetable-2";
  import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
  // import FieldsDef from "./FieldsDef.js";
  import axios from "axios";
  import _ from "lodash";
  
  export default {
    name: "Container",
    props: ["user", "breadcrumbs", "domain"],
    components: { Footer, Sidebar, Navbar },
  
    data() {
      return {
        form: {
          id: null,
          type: null,
          name: null,
          first_lastname: null,
          second_lastname: null,
          social_reason: null,
          rfc: '',
          uso_cfdi: null,
          status: null,
          contact: null,
          phone: null,
          mobile: null,
          email: null,
          observations: null,
          country: null,
          state: null,
          municipality: null,
          postal_code: null,
          suburb: null,
          street: null,
          ext_num: null,
          int_num: null,
        },
        show: false,
        type : null,
        status: [{ text: 'Elige 1', value: null }, 'activo', 'inactivo', 'baja'],
        types: [{ text: 'Elige 1', value: null }, 'fisica', 'moral'],
        fisica: false,
        moral: false,
        no_rfc: true,
        success: false,
        error: false,
        errors: {},
      };
    },
    methods: {
      type_customer(){
        let rfc = this.form.rfc;
        
        axios.get("/customers/search-rfc", { params : {rfc}  }).then((response) => {
         
            
            console.log(response.data.status);
            if(response.data.status == 'false'){
                Vue.swal('El rfc ingresado ya existe', '', 'error');
            }else{
                if( this.form.rfc.length == 12){
                    this.no_rfc = false;
                    this.show = true;
                    this.form.type = 'moral';
                    this.moral = true;
                }else if(this.form.rfc.length == 13){
                    this.no_rfc = false;
                    this.show = true;
                    this.form.type = 'fisica';
                    this.fisica = true;
                }

                if( this.form.rfc.length != 12 &&  this.form.rfc.length != 13){
                    Vue.swal('Ingresa un rfc válido', '', 'error');
                }
            }
        });
      },
      onSubmit(event) {
          event.preventDefault();
        let el = this;

          axios.post('/customers/store', this.form)
          .then(function (response) {
                el.onSuccess(response.data.message);
          })
          .catch(function (error) {
            if(error.response.status == 422){
                el.setErrors(error.response.data.errors);
            }else{
                el.onFailure(error.response.data.message);
            }
            //   console.log(error);
          });
  
      },
      onChange(event){
        console.log(this.form.type);
        this.show = true;
        if(this.form.type == 'fisica')
            this.fisica = true;
        else
            this.moral = true;

      },
      onSuccess(message){
        this.success = true;
        el.form.type = '';
        el.form.id = '';
        el.form.name = '';
        el.form.first_lastname = '';
        el.form.second_lastname = '';
        el.form.social_reason = '';
        el.form.rfc = '';
        el.form.uso_cfdi = '';
        el.form.status = '';
        el.form.contact = '';
        el.form.phone = '';
        el.form.mobile = '';
        el.form.email = '';
        el.form.observations = '';
        el.form.country = '';
        el.form.state = '';
        el.form.municipality = '';
        el.form.city = '';

        el.form.postal_code = '';
        el.form.suburb = '';
        el.form.street = '';
        el.form.ext_num = '',
        el.form.int_num = '';

        el.show = false;
        el.type = null;

        el.fisica = false;
        el.moral = false;
        el.no_rfc = true;
        Vue.swal(message);
      },
      onFailure(message){

        this.error = true;
      },
      setErrors(errors){
        console.log(errors);
        this.errors = errors;
      },
      hasError(fieldName){
        return (fieldName in this.errors);
      }
    },
  };
  </script>
  
  <style>
  #app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
    margin-top: 20px;
  }
  button.ui.button {
    padding: 8px 3px 8px 10px;
    margin-top: 1px;
    margin-bottom: 1px;
  }
  </style>