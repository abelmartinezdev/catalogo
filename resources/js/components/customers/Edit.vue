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
            <b-form @submit="onSubmit" v-if="show">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <b-form-group id="input-group-3" label="Tipo de persona:" label-for="input-3">
                            <b-form-select
                            id="input-3"
                            v-model="form.type"
                            :options="types"
                            required
                            ></b-form-select>
                        </b-form-group>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inline-form-input-name">Nombre</label>
                        <b-form-input
                        v-model="form.name"
                        id="inline-form-input-name"
                        class="form-control"
                        placeholder="Jane"
                        ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Apellido paterno</label>
                        <b-form-input
                            v-model="form.first_lastname"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inline-form-input-name">Apellido materno</label>
                        <b-form-input
                        v-model="form.second_lastname"
                        id="inline-form-input-name"
                        class="form-control"
                        placeholder="Jane"
                        ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Razón social</label>
                        <b-form-input
                            v-model="form.social_reason"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">RFC</label>
                        <b-form-input
                            v-model="form.rfc"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Uso CFDI</label>
                        <b-form-input
                            v-model="form.uso_cfdi"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <b-form-group id="input-group-3" label="Estatus:" label-for="input-3">
                            <b-form-select
                            id="input-3"
                            v-model="form.status"
                            :options="status"
                            required
                            ></b-form-select>
                        </b-form-group>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Contacto</label>
                        <b-form-input
                            v-model="form.contact"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Teléfono</label>
                        <b-form-input
                            v-model="form.phone"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Celular</label>
                        <b-form-input
                            v-model="form.mobile"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Correo electrónico</label>
                        <b-form-input
                            v-model="form.email"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            type="email"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Observaciones</label>
                        <b-form-textarea
                            v-model="form.observations"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            type="textarea"
                            ></b-form-textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Pais</label>
                        <b-form-input
                            v-model="form.country"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Estado</label>
                        <b-form-input
                            v-model="form.state"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Municipio</label>
                        <b-form-input
                            v-model="form.municipality"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Ciudad</label>
                        <b-form-input
                            v-model="form.city"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Código postal</label>
                        <b-form-input
                            v-model="form.postal_code"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Colonia</label>
                        <b-form-input
                            v-model="form.suburb"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword3">Calle</label>
                        <b-form-input
                            v-model="form.street"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">No. exterior</label>
                        <b-form-input
                            v-model="form.ext_num"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">No. interior</label>
                        <b-form-input
                            v-model="form.int_num"
                            id="inline-form-input-name"
                            class="form-control"
                            placeholder="Doe"
                            ></b-form-input>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <b-button class="float-right" type="submit" variant="success">Editar</b-button>
                        <!-- <b-button type="reset" variant="danger">Reset</b-button> -->
                    </div>
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
  props: ["user", "breadcrumbs", "domain", "customer"],
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
        rfc: null,
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
      show: true,
      status: [{ text: 'Elige 1', value: null }, 'activo', 'inactivo', 'baja'],
      types: [{ text: 'Elige 1', value: null }, 'fisica', 'moral'],
      
    };
  },

  //   watch: {
  //     data(newVal, oldVal) {
  //       this.$refs.vuetable.refresh();
  //     }
  //   },

  mounted() {
    console.log()
    axios.get("/customers/"+this.customer.id+"/get-customer").then((response) => {
        
        this.data = response.data;
        console.log(this.data);
        this.form.type = this.data.type;
        this.form.id = this.data.id;
        this.form.name = this.data.name;
        this.form.first_lastname = this.data.first_lastname;
        this.form.second_lastname = this.data.second_lastname;
        this.form.social_reason = this.data.social_reason;
        this.form.rfc = this.data.rfc;
        this.form.uso_cfdi = this.data.uso_cfdi;
        this.form.status = this.data.status;
        this.form.contact = this.data.contact;
        this.form.phone = this.data.phone,
        this.form.mobile = this.data.mobile,
        this.form.email = this.data.email,
        this.form.observations = this.data.observations,
        this.form.country = this.data.country,
        this.form.state = this.data.state,
        this.form.municipality = this.data.municipality,
        this.form.city = this.data.city,
        
        this.form.postal_code = this.data.postal_code,
        this.form.suburb = this.data.suburb,
        this.form.street = this.data.street,
        this.form.ext_num = this.data.ext_num,
        this.form.int_num = this.data.int_num
    });
  },

  methods: {
    onSubmit(event) {
        event.preventDefault()
        // alert(JSON.stringify(this.form))
        axios.put('/customers/'+this.form.id+'/update', this.form)
        .then(function (response) {
            console.log("respueston");
            console.log(response.status);
            if(response.status == 200){
                Vue.swal('Cliente actualizado correctamente');
            }
        })
        .catch(function (error) {
            console.log(error);
        });

    },
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