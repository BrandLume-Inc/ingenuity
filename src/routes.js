import Home 		from './views/Home.vue';
import About 		from './views/About.vue';
import Service 		from './views/services/Service.vue';
import Projects 	from './views/projects/Projects.vue';
import Project 		from './views/projects/single/SingleProject.vue';
// import Team 		from './views/Team.vue';
// import Team2 		from './views/Team2.vue';
import Team3 		from './views/Team3.vue';
import Contact 		from './views/Contact.vue';
import Blog 		from './views/blog/Blog.vue';
import BlogSingle 	from './views/blog/single/Single.vue';

export const routes = [
	{ path: '/about-us/the-team', component: Team3, props: true },
	{ path: '/about-us', component: About, props: true },
	{ path: '/services/:slug', component: Service, props: true },
	{ path: '/projects/:slug', component: Project, props: true },
	{ path: '/projects', component: Projects, props: true },
	{ path: '/contact-us', component: Contact, props: true },
	{ path: '/contact', component: Contact, props: true },
	{ path: '/news/:id/:slug', component: BlogSingle, props: true },
	{ path: '/news', component: Blog, props: true },
	{ path: '/', component: Home, props: true },
	{ path: '*', redirect: '/' }
];