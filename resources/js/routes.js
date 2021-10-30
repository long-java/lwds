import tag from './pages/Tag'
import questions from './pages/Questions'
import exam from './pages/Exam'
import posts from './pages/Posts'
import login from './pages/Login'
import register from './pages/Register'
import postup from './pages/PostUp'
import detailpost from './pages/DetailPost'
import upload from './pages/Upload'
import account from './pages/Account'

import menu from './components/Menu'
import notfound from './components/NotFound'

import my_posts from './components/MyPosts'
import my_questions from './components/MyQuestions'
import my_contact from './components/MyContact'
import my_follow_to from './components/MyFollowTo'
import my_follow_from from './components/MyFollowFrom'


//ADMIN
import failed_role from './admin/components/FailedRole'

import menu_admin from './admin/pages/MenuAdmin'
import dashboard from './admin/pages/Dashboard'
import all_message from './admin/pages/AllMessage'
import all_user from './admin/pages/AllUser'
import all_post from './admin/pages/AllPost'
import all_tag from './admin/pages/AllTag'





const routes = [

    //ADMIN
    { path: '/failed-role', component: failed_role, name: 'failed_role'},
    { 
        path: '/admin', 
        component: menu_admin, 

        //Check route - role:admin
        beforeEnter: (to, form, next) =>{
            axios.get('/api/check-role-admin',
                {
                    headers:{
                                Authorization: 'Bearer ' + localStorage.getItem('token'),
                            }
                }
            )
            .then(()=>{
                next()
            }).catch(()=>{
                return next({ 
                    name: 'failed_role'
                })
            })
       },

        children: [
            { path: '/', component: dashboard, name: 'dashboard'},
            { path: '/admin/all-users', component: all_user, name: 'all_user'},
            { path: '/admin/all-messages', component: all_message, name: 'all_message'},
            { path: '/admin/all-posts', component: all_post, name: 'all_post'},
            { path: '/admin/all-tags', component: all_tag, name: 'all_tag'},
        ]
    
    
    },

    

    //GUEST
    { path: '*', component: notfound, name: 'notfound'},
    { path: '/exam', component: exam, name: 'exam'},
    {
        path: '/',
        component: menu,
        children: [
            { path: '/', component: posts, name: 'posts'},
            { path: '/tag/:id', component: posts, name: 'tags'},
            { path: '/questions', component: questions, name: 'questions'},
            { path: '/tag', component: tag, name: 'tag'},
            { path: '/detail-post/:id', component: detailpost, name: 'detailpost'},
            {
                path: "/post-up",
                name: "postup",
                component: postup,
                beforeEnter: (to, form, next) =>{
                    axios.get('/api/athenticated',
                        {
                            headers:{
                                        Authorization: 'Bearer ' + localStorage.getItem('token'),
                                    }
                        }
                    )
                    .then(()=>{
                        next()
                    }).catch(()=>{
                        return next({ name: 'login'})
                    })
               }
            },


            {path: '/account/:id', component: account, name: 'account',
                // beforeEnter: (to, form, next) =>{
                //     axios.get('/api/athenticated',
                //         {
                //             headers:{
                //                         Authorization: 'Bearer ' + localStorage.getItem('token'),
                //                     }
                //         }
                //     )
                //     .then(()=>{
                //         next()
                //     }).catch(()=>{
                //         return next({ name: 'login'})
                //     })
                // },
                children:[
                    { path: '/account/:id', component: my_posts, name: 'my_posts'},
                    // { path: '/my-questions/:id', component: my_questions, name: 'my_questions'},
                    { path: '/my-contact/:id', component: my_contact, name: 'my_contact'},
                    { path: '/my-follow-to/:id', component: my_follow_to, name: 'my_follow_to'},
                    { path: '/my-follow-from/:id', component: my_follow_from, name: 'my_follow_from'},
                ]
            }, 
        ],
    },     
    {path: '/login', component: login, name: 'login'} ,
    {path: '/register', component: register, name: 'register'}  , 
    {path: '/upload', component: upload, name: 'upload'}  , 
    
];

export default routes;