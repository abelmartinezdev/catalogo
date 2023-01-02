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

            <!-- <CustomerTable /> -->
            <div class="col-md-12 p-5">
                <b-button @click="newCustomer()" class="float-right" type="submit" variant="success">Nuevo</b-button>
            </div>
            <div class="col-md-12">
                <div class="ui container">
                    <vuetable ref="vuetable"
                        :api-mode="false"
                        :fields="fields"
                :per-page="perPage"
                        :data-manager="dataManager"
                pagination-path="pagination"
                    @vuetable:pagination-data="onPaginationData"
                    >
                        <div slot="actions" slot-scope="props">
                            <button 
                                class="btn btn-primary" 
                                @click="onActionClicked('view-item', props.rowData)"
                            >
                            <i class="fas fa-search-plus"></i>
                            </button>
                            <!-- <button 
                                class="ui small button" 
                                @click="onActionClicked('edit-item', props.rowData)"
                            >
                                <i class="edit icon"></i>
                            </button> -->
                            <button 
                                class="btn btn-danger" 
                                @click="onActionClicked('delete-item', props.rowData)"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </vuetable>
                    <div style="padding-top:10px">
                    <vuetable-pagination ref="pagination"
                        @vuetable-pagination:change-page="onChangePage"
                    ></vuetable-pagination>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Navbar from '../global/Navbar'
import Sidebar from '../global/Sidebar'
import Footer from '../global/Footer'

import Vuetable from "vuetable-2";
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
import FieldsDef from "./FieldsDef.js";
import axios from "axios";
import _ from "lodash";

export default {
    name: "Container",
    props: ['user', 'breadcrumbs', 'domain'],
    components: { Footer, Sidebar, Navbar,Vuetable, VuetablePagination},

  data() {
    return {
      fields: FieldsDef,
      perPage: 10,
      data: []
    };
  },

  watch: {
    data(newVal, oldVal) {
      this.$refs.vuetable.refresh();
    }
  },

  mounted() {
    axios.get("/customers/list").then(response => {
        console.log(response);
      this.data = response.data;
    });
  },

  methods: {
    newCustomer(){
        window.location.href = "/customers/create";
    },
    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
    },
    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },
    dataManager(sortOrder, pagination) {
      if (this.data.length < 1) return;

      let local = this.data;

      // sortOrder can be empty, so we have to check for that as well
      if (sortOrder.length > 0) {
        console.log("orderBy:", sortOrder[0].sortField, sortOrder[0].direction);
        local = _.orderBy(
          local,
          sortOrder[0].sortField,
          sortOrder[0].direction
        );
      }

      pagination = this.$refs.vuetable.makePagination(
        local.length,
        this.perPage
      );
      console.log('pagination:', pagination)
      let from = pagination.from - 1;
      let to = from + this.perPage;

      return {
        pagination: pagination,
        data: _.slice(local, from, to)
      };
    },
    onActionClicked(action, data) {
      console.log("slot actions: on-click", data.id);
        if(action == 'view-item')
            window.location.href = "/customers/"+data.id+"/edit/";
        else if(action == 'delete-item'){
            axios.delete('/customers/'+data.id+'/destroy')
            .then(function (response) {
                console.log("respueston");
                console.log(response.status);
                if(response.status == 200){
                    window.location.href = "/home";
                    Vue.swal('Cliente eliminado correctamente');
                   
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
  }
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