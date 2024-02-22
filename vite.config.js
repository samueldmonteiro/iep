import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/styles/app.scss',
                'resources/styles/course_page.css',
                'resources/styles/bootstrap4/bootstrap.min.css',
                'resources/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css',
                'resources/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
                'resources/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
                'resources/plugins/OwlCarousel2-2.2.1/animate.css',
                'resources/styles/main_styles.css',
                'resources/styles/responsive.css',
                'resources/styles/courses_styles.css',
                'resources/styles/courses_responsive.css',
                'resources/styles/modal.css',
                'resources/styles/contact_styles.css',
                'resources/styles/contact_responsive.css',
                'resources/js/jquery-3.2.1.min.js',
                'resources/styles/bootstrap4/popper.js',
                'resources/styles/bootstrap4/bootstrap.min.js',
                'resources/plugins/greensock/TweenMax.min.js',
                'resources/plugins/greensock/TimelineMax.min.js',
                'resources/plugins/scrollmagic/ScrollMagic.min.js',
                'resources/plugins/greensock/animation.gsap.min.js',
                'resources/plugins/greensock/ScrollToPlugin.min.js',
                'resources/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
                'resources/plugins/scrollTo/jquery.scrollTo.min.js',
                'resources/plugins/easing/easing.js',
                'resources/js/custom.js',
                'resources/js/app.js',
                'resources/js/modal/main.js',
                'resources/js/subscribe_course.js',
                'resources/js/admin/datatables-simple-demo.js',
                'resources/js/admin/admin.js',
                'resources/js/admin/demo/chart-area-demo.js',
                'resources/js/admin/demo/chart-bar-demo.js',
                'resources/styles/admin/styles.css',
            ],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            '@': '/resources/js',
            '~bootstrap': '/node_modules/bootstrap'
        }
    }
});
