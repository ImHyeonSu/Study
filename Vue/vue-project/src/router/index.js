import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import DataBinding from '../views/DataBinding.vue'
import DataBindingInputText from '../views/DataBindingInputText.vue'
import DataBindingInputNumber from '../views/DataBindingInputNumber.vue'
import DataBindingInputTextArea from '../views/DataBindingInputTextarea.vue'
import DataBindingSelect from '../views/DataBindingSelect.vue'
import DataBindingCheckBox from '../views/DataBindingCheckbox.vue'
import DataBindingCheckBox2 from '../views/DataBindingCheckbox2.vue'
import DataBindingRadio from '../views/DataBindingRadio.vue'
import DataBindingAttribue from '../views/DataBindingAttribue.vue'
import DataBindingButton from '../views/DataBindingButton.vue'
import DataBindingClass from '../views/DataBindingClass.vue'
import DataBindingClass2 from '../views/DataBindingClass.vue'
import DataBindingStyle from '../views/DataBindingStyle.vue'
import DataBindingList from '../views/DataBindingList.vue'
import RenderingVif from '../views/RenderingVif.vue'
import EventClick from  '../views/EventClick.vue'
import EventChange from  '../views/EventChange.vue'
import ComputedVue from  '../views/ComputedVue.vue'
import WatchVue from '../views/WatchVue.vue'
import DataBindingList2 from '../views/DataBindingList2.vue'
import NesteadComponent from '../views/NesteadComponent.vue'
import ParentComponent from '../views/ParentComponent.vue'
import ParentComponent2 from '../views/ParentComponent2.vue'
import ParentComponent3 from '../views/ParentComponent3.vue'
import ParentComponent4 from '../views/ParentComponent4.vue'
import ParentComponent5 from '../views/ParentComponent5.vue'
import Mixins from '../views/MixinsVue.vue'

const routes = [
  {
    path: '/', //説明ーpathはurl住所を定義、componentはvueファイル
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    //以下のrouteはpathに接近が行う前まではimportが行わないこと
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/databinding',
    name: 'DataBinding',
    component: DataBinding
  },
  {
    path: '/databindinginputtext',
    name: 'DataBindingInputText',
    component: DataBindingInputText
  },
  {
    path: '/databindinginputnumber',
    name: 'DataBindingInputNumber',
    component: DataBindingInputNumber
  },
  {
    path: '/databindinginputtextarea',
    name: 'DataBindingInputTextArea',
    component: DataBindingInputTextArea
  },
  {
    path: '/databindingselect',
    name: 'DataBindingSelect',
    component: DataBindingSelect
  },
  {
    path: '/databindingcheckbox',
    name: 'DataBindingCheckBox',
    component: DataBindingCheckBox
  },
  {
    path: '/databindingcheckbox2',
    name: 'DataBindingCheckBox2',
    component: DataBindingCheckBox2
  },
  {
    path: '/databindingradio',
    name: 'DataBindingRadio',
    component: DataBindingRadio
  },
  {
    path: '/DataBindingattribue',
    name: 'DataBindingAttribue',
    component: DataBindingAttribue
  },
  {
    path: '/DataBindingbutton',
    name: 'DataBindingButton',
    component: DataBindingButton
  },
  {
    path: '/DataBindingclass',
    name: 'DataBindingClass',
    component: DataBindingClass
  },
  {
    path: '/DataBindingclass2',
    name: 'DataBindingClass2',
    component: DataBindingClass2
  },
  {
    path: '/DataBindingstyle',
    name: 'DataBindingStyle',
    component: DataBindingStyle
  },
  {
    path: '/DataBindinglist',
    name: 'DataBindingList',
    component: DataBindingList
  },
  {
    path: '/Renderingvif',
    name: 'RenderingVif',
    component: RenderingVif
  },
  {
    path: '/Eventclick',
    name: 'EventClick',
    component: EventClick
  },
  {
    path: '/Eventchange',
    name: 'EventChange',
    component: EventChange
  },
  {
    path: '/Computedvue',
    name: 'ComputedVue',
    component: ComputedVue
  },
  {
    path: '/Watchvue',
    name: 'WatchVue',
    component: WatchVue
  },
  {
    path: '/DataBindinglist2',
    name: 'DataBindingList2',
    component: DataBindingList2
  },
  {
    path: '/Nesteadcomponent',
    name: 'NesteadComponent',
    component: NesteadComponent
  },
  {
    path: '/Parentcomponent',
    name: 'ParentComponent',
    component: ParentComponent
  },
  {
    path: '/Parentcomponent2',
    name: 'ParentComponent2',
    component: ParentComponent2
  },
  {
    path: '/Parentcomponent3',
    name: 'ParentComponent3',
    component: ParentComponent3
  },
  {
    path: '/Parentcomponent4',
    name: 'ParentComponent4',
    component: ParentComponent4
  },
  {
    path: '/Parentcomponent5',
    name: 'ParentComponent5',
    component: ParentComponent5
  },
  {
    path: '/Mixins',
    name: 'Mixins',
    component: Mixins
  },
  {
    path: '/googlelogin',
    name: 'GoogleLogin',
    component: () => import( /* webpackChunkName: "parent" */ '../views/GoogleLogin.vue')
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
