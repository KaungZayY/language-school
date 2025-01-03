import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutUsView from '../views/AboutUsView.vue'
import ContactUsView from '@/views/ContactUsView.vue'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import CourseDetailView from '@/views/CourseDetailView.vue'
import CourseApplyView from '@/views/CourseApplyView.vue'
import AdminPannelView from '@/views/AdminPannelView.vue'
import CourseCreateView from '@/views/CourseCreateView.vue'
import CourseEditView from '@/views/CourseEditView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminPannelView,
    },
    {
      path: '/courses/create',
      name: 'course-create',
      component: CourseCreateView,
    },
    {
      path: '/courses/:id',
      name: 'course-detail',
      component: CourseDetailView,
    },
    {
      path: '/courses/:id/edit',
      name: 'course-update',
      component: CourseEditView,
    },
    {
      path: '/courses/:id/apply',
      name: 'course-apply',
      component: CourseApplyView,
    },
    {
      path: '/about',
      name: 'about',
      component: AboutUsView,
    },
    {
      path: '/contact-us',
      name: 'contact-us',
      component: ContactUsView,
    },
  ],
})

export default router
