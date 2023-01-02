import VuetableFieldHandle from 'vuetable-2/src/components/VuetableFieldHandle.vue'

export default [
  {
    name: VuetableFieldHandle
  },
  {
    name: 'name',
    title: '<span class="orange glyphicon glyphicon-user"></span> Nombre',
    sortField: 'name'
  },
  {
    name: 'social_reason',
    title: '<span class="orange glyphicon glyphicon-user"></span> Nombre comercial',
    sortField: 'social_reason'
  },
  {
    name: 'rfc',
    sortField: 'rfc'
  },
  'email', 
  'mobile',
  // {
  //   name: 'gender',
  //   formatter: (value) => {
  //     return value === 'M' ? 'Male' : 'Female'
  //   }
  // },
  'actions'
]