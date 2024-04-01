import NotFound from '../components/WEB/NotFound';
import ComingSoon from '../components/WEB/ComingSoon';
import Index from '../components/WEB/Index/Layout';
import BlacklistedTokens from '../components/WEB/Blacklist/Tokens/Layout';
import BlacklistedWallets from '../components/WEB/Blacklist/Wallets/Layout';
import ContentCreators from '../components/WEB/ContentCreators';
import Referral from '../components/WEB/Referral';
import ScannerToken from '../components/WEB/Scanner/Token';
import ScannerWallet from '../components/WEB/Scanner/Wallet';
import MarketplaceIndex from '../components/WEB/Marketplace/Index';
import Games from '../components/WEB/Gaming/Games';
import AcademyIndex from '../components/WEB/Academy/Index';
import CourseShow from '../components/WEB/Academy/Courses/Show.vue';
import ClassroomLesson from '../components/CLASSROOM/Lessons/Show.vue';
import WebStakingIndex from '../components/WEB/Staking/Index.vue';
import WebSwapIndex from '../components/WEB/Swap/Index.vue';

export default {
  routes: [
    {
      path: '*',
      component: NotFound,
      name: 'not-found',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/',
      component: BlacklistedTokens,
      name: 'index',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/scan-defi',
      component: Index,
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/partners',
      component: ComingSoon,
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/coming-soon',
      component: ComingSoon,
      name: 'coming-soon',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/scanner',
      component: ScannerToken,
      name: 'scanner',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    // {
    //   path: '/scanner/:address',
    //   component: ScannerToken,
    //   name: 'scanner.token',
    //   meta: {
    //     layout: 'web',
    //     transition: 'fade-in-down',
    //   },
    // },
    {
      path: '/learn',
      component: ComingSoon,
      name: 'learn',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/swap',
      component: WebSwapIndex,
      name: 'swap',
      meta: {
        layout: 'fullwidth',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/games',
      component: Games,
      name: 'games',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/voting-zone',
      component: ComingSoon,
      name: 'voting-zone',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/community',
      component: ComingSoon,
      name: 'community',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/buy',
      component: ComingSoon,
      name: 'buy',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/alerts',
      component: ComingSoon,
      name: 'alerts',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/referral',
      component: Referral,
      name: 'referral',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/battle',
      component: ComingSoon,
      name: 'battle',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/staking',
      component: WebStakingIndex,
      name: 'staking',
      meta: {
        layout: 'fullwidth',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/farming',
      component: ComingSoon,
      name: 'farming',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/rewards',
      component: ComingSoon,
      name: 'rewards',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/nft',
      component: ComingSoon,
      name: 'nft',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/marketplace',
      component: MarketplaceIndex,
      name: 'marketplace',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/blacklist/tokens',
      component: BlacklistedTokens,
      name: 'blacklist.tokens',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/blacklist/wallets',
      component: BlacklistedWallets,
      name: 'blacklist.wallets',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/scanner/token/:address',
      component: ScannerToken,
      name: 'scanner.token',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/scanner/wallet/:address',
      component: ScannerWallet,
      name: 'scanner.wallet',
      meta: {
        layout: 'web',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/academy',
      component: AcademyIndex,
      name: 'academy.index',
      redirect: {
        name: 'academy.courses.index',
      },
      meta: {
        layout: 'academy',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/academy/courses',
      component: AcademyIndex,
      name: 'academy.courses.index',
      meta: {
        layout: 'academy',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/academy/courses/:course',
      component: CourseShow,
      name: 'academy.course.show',
      meta: {
        layout: 'academy',
        transition: 'fade-in-down',
      },
    },
    {
      path: '/classroom/courses/:course/lessons/:lesson',
      component: ClassroomLesson,
      name: 'classroom.lesson',
      meta: {
        layout: 'classroom',
        transition: 'fade-in-down',
      },
    },
  ],

  mode: 'history',

  linkActiveClass: 'is-active',

  scrollBehavior() {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve({ x: 0, y: 0 })
      }, 100)
      // }, 200)
    });
  },
}
