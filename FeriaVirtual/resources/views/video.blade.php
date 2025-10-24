<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quick Admin Panel - CRUD Generator</title>


    <link rel="icon" type="image/svg+xml" href="img/quickadmin.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="css2?family=Be+Vietnam&family=Space+Grotesk:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="css/app.css?id=e1401ad06876bf23e9e54475f0e43f5e">

    <script src="recaptcha/api.js?render=6Lc0G6cbAAAAAMySwEKMZPrqnX3_V5zuPl9oGyYp"></script>
    <script src="gh/alpinejs/alpine%40v2.7.3/dist/alpine.min.js" defer=""></script>
    <script src="ajax/libs/prism/1.22.0/prism.min.js"></script>
    <script src="ajax/libs/prism/1.22.0/plugins/autoloader/prism-autoloader.min.js"></script>


    <link rel="stylesheet" href="ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="gtag/js?id=UA-79616612-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-79616612-4');
    </script>
</head>

<body class="antialiased text-gray-800 font-body flex flex-col min-h-screen">
<header id="nav" class="sticky top-0 z-40 text-gray-800 transition bg-white shadow-sm">
    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8">
        <nav class="flex items-center h-20 space-x-8">
            <a class="text-xl font-bold font-display" href="index.htm">Quick Admin Panel</a>

            <div class="flex-1"></div>

            <ul class="items-center hidden space-x-8 text-sm font-medium transition lg:flex">
                <li>
                    <a class="transition opacity-80 hover:opacity-70 focus:opacity-100" href="demo-projects.html">Examples</a>
                </li>
                <li>
                    <a class="transition opacity-80 hover:opacity-70 focus:opacity-100" href="https://helpdocs.quickadminpanel.com/" target="_blank">Docs</a>
                </li>
                <li>
                    <a class="transition opacity-80 hover:opacity-70 focus:opacity-100" href="index.htm#pricing">Pricing</a>
                </li>
                <li>
                    <a class="transition opacity-80 hover:opacity-70 focus:opacity-100" href="https://blog.quickadminpanel.com/" target="_blank">Blog</a>
                </li>
                <li>
                    <a class="transition opacity-80 hover:opacity-70 focus:opacity-100" href="index.htm#contact">Contact</a>
                </li>
            </ul>

            <div class="hidden h-full border-r border-current opacity-10 lg:block"></div>

            <ul class="items-center hidden space-x-8 text-sm font-medium lg:flex">


                <li>
                    <a class="transition opacity-80 hover:opacity-70 focus:opacity-100" href="login.html">Login</a>
                </li>



                <li>
                    <a class="button button--primary px-4 text-sm h-9" href="register.html">Try for free</a>
                </li>
            </ul>

            <a title="Open menu" class="flex items-center px-2 space-x-2 text-sm font-bold text-white uppercase rounded shadow h-9 bg-primary-600 font-display lg:hidden" href="#menu-open">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>

                <span>Open</span>
            </a>
        </nav>
    </div>

    <div class="w-full border-t border-current opacity-10"></div>
</header>

<nav id="mobile-nav" class="fixed inset-0 z-50 invisible w-full p-2 transition transform scale-95 translate-y-2 opacity-0 lg:hidden">
    <div class="w-full bg-white border border-gray-200 shadow-2xl rounded-xl">
        <header class="flex items-center justify-between p-4 border-b border-gray-100">
            <a class="text-xl font-bold font-display" href="index.htm">QuickAdminPanel</a>

            <a title="Close menu" class="flex items-center px-2 space-x-2 text-sm font-bold text-white uppercase rounded shadow h-9 bg-primary-600 font-display" href="#">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>

                <span>Close</span>
            </a>
        </header>

        <ul class="flex flex-col p-4 space-y-6 text-xl font-medium transition">
            <li>
                <a class="block transition opacity-80 hover:opacity-70 focus:opacity-100" href="demo-projects.html">
                    Examples
                </a>
            </li>
            <li>
                <a class="block transition opacity-80 hover:opacity-70 focus:opacity-100" href="index.htm#contact">
                    Contact
                </a>
            </li>
            <li>
                <a class="block transition opacity-80 hover:opacity-70 focus:opacity-100" href="https://blog.quickadminpanel.com/">
                    Blog
                </a>
            </li>
            <li>
                <a class="block transition opacity-80 hover:opacity-70 focus:opacity-100" href="https://helpdocs.quickadminpanel.com/">
                    Docs
                </a>
            </li>
            <li>
                <a class="block transition opacity-80 hover:opacity-70 focus:opacity-100" href="index.htm#pricing">
                    Pricing
                </a>
            </li>
            <li>
                <a class="block transition opacity-80 hover:opacity-70 focus:opacity-100" href="login.html">
                    Login
                </a>
            </li>
            <li>
                <a class="button button--primary flex" href="register.html">Try for free</a>
            </li>
        </ul>
    </div>
</nav>

<section x-data="{showingDemo: false}" class="relative pt-32 bg-gradient-to-b from-white to-gray-50">
    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8 relative z-10">
        <header class="flex flex-col items-center max-w-3xl mx-auto space-y-6 text-center">
            <h1 class="text-4xl font-bold tracking-tighter md:text-6xl font-display">
                Generate your next Laravel Admin panel in minutes.
            </h1>

            <p class="text-xl text-gray-500">
                Starting new Laravel project? Deliver first version faster!
                <br>
                We will generate DB models, fresh CRUD adminpanel and API for you.
            </p>

            <footer class="inline-grid items-center grid-flow-col gap-6">

                <a class="button button--primary" href="register.html">Try for free</a>
                <a class="button button--secondary" href="#how-it-works">Find out how</a>
            </footer>
        </header>

        <figure class="relative mt-24 overflow-hidden bg-gray-800 shadow-xl rounded-2xl" style="padding-top: 56.25%">
            <img class="absolute inset-0 object-cover object-top w-full h-full transform scale-105 opacity-50" style="filter: blur(4px)" src="img/previewimg.png" alt="Dashboard picture">

            <div class="absolute inset-0 flex flex-col items-center justify-center w-full h-full">
                <button type="button" title="Play demo video" @click="showingDemo = true" class="flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg">
                    <svg class="w-12 h-12 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            </div>
        </figure>
    </div>

    <svg class="absolute inset-x-0 bottom-0 w-full" viewbox="0 0 720 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0L720 64H0V0Z" fill="#27272A"></path>
    </svg>

    <button title="Close demo video" type="button" x-show.transition="showingDemo" @click="showingDemo = false" class="fixed inset-0 z-50 flex items-center justify-center w-full h-screen p-8 bg-black bg-opacity-50" id="demo-modal">
        <template x-if="showingDemo">
            <iframe class="shadow-2xl rounded-xl" width="1280" height="720" src="https://www.youtube.com/embed/uB-Vxj7IyRk?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" lazy=""></iframe>
        </template>
    </button>
</section>

<section class="relative py-24 text-white bg-gray-800 js-dark-section">
    <div class="absolute inset-x-0 top-0 flex flex-col items-center opacity-10">
        <img class="absolute top-0 w-full max-w-4xl mx-auto transform rotate-180" src="images/hero-illustration.svg" alt="Illustration">
    </div>

    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8">
        <div class="relative space-y-24">
            <header class="space-y-4 text-center">
                <p class="text-sm font-bold tracking-wider uppercase font-display text-primary-500">
                    How it works
                </p>

                <h2 id="how-it-works" class="text-4xl font-bold tracking-tighter md:text-5xl font-display">
                    Getting started is <span class="relative z-10 inline-block">
    <span class="relative z-10 inline-block">plain simple.</span>
    <span class="absolute inset-x-0 bottom-0 z-0 block w-full h-2 -mb-1 rounded-full shadow-md bg-gradient-to-br from-primary-500 to-primary-700"></span>
</span>
                </h2>
            </header>

            <div class="grid items-center gap-16 md:grid-cols-5">
                <article class="md:col-span-2">
                    <div class="flex items-center justify-center w-12 h-12 text-xl font-bold bg-gray-700 border border-gray-600 rounded-full shadow-xl font-display border-opacity-40">
                        1
                    </div>

                    <h2 class="mt-6 text-2xl font-bold tracking-tighter md:text-4xl font-display">Start a new project</h2>

                    <p class="mt-2 text-base text-gray-400 md:text-xl">
                        Register and create menus, fields and relationships online, install modules. No coding
                        required. Test your panel on our server.
                    </p>
                </article>

                <div class="flex flex-col h-full md:col-span-3 bg-gray-700 border border-gray-600 shadow-xl rounded-2xl border-opacity-40 overflow-hidden">
                    <header class="flex items-center p-3 overflow-hidden border-b border-gray-800 whitespace-nowrap">
                        <p class="text-sm font-bold rounded-full font-display">Select modules</p>
                    </header>

                    <div class="grid gap-3 p-3 text-base md:grid-cols-2">
                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">Multi-tenancy</p>
                            <p class="text-sm text-gray-400">
                                Restrict access to CRUD entries to only users (or teams) who actually created them.
                            </p>
                        </div>

                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">Reports generator</p>
                            <p class="text-sm text-gray-400">
                                Create simple visual chart-reports from the data in your CRUDs. Group by date,
                                fields or relationships.
                            </p>
                        </div>

                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">API generator</p>
                            <p class="text-sm text-gray-400">
                                Create API Controllers and Routes for any of your CRUDs, just by ticking a checkbox.
                                Includes OAuth with Laravel Passport.
                            </p>
                        </div>

                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">System Calendar</p>
                            <p class="text-sm text-gray-400">
                                Create a calendar, combining event sources from one or more CRUDs.
                            </p>
                        </div>

                        <footer class="md:col-span-2">
                            <p class="text-sm text-center text-gray-400">
                                <a href="https://helpdocs.quickadminpanel.com/modules" target="_blank" class="underline">See all 21 modules</a>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="flex flex-col items-center -my-24">
                    <div class="w-1/2 h-24 ml-24 border-b border-r border-gray-700 border-dashed rounded-br-full">
                    </div>
                    <div class="w-1/2 h-24 mr-24 -mt-px border-t border-l border-gray-700 border-dashed rounded-tl-full">
                    </div>
                </div>
            </div>

            <div class="grid items-center gap-16 md:grid-cols-5">
                <article class="md:col-span-2 lg:order-2">
                    <div class="flex items-center justify-center w-12 h-12 text-xl font-bold bg-gray-700 border border-gray-600 rounded-full shadow-xl font-display border-opacity-40">
                        2
                    </div>

                    <h2 class="mt-6 text-2xl font-bold tracking-tighter md:text-4xl font-display">Review and download</h2>

                    <p class="mt-2 text-base text-gray-400 md:text-xl">
                        View generated Laravel files at any time. Download the whole project. Unarchive and install
                        it on your server with a few commands.
                    </p>
                </article>

                <div class="flex flex-col h-full md:col-span-3 bg-gray-700 border border-gray-600 shadow-xl rounded-2xl border-opacity-40 overflow-hidden" x-data="{tab: 0}">
                    <header class="p-3 overflow-auto border-b border-gray-800 whitespace-nowrap">
                        <button x-on:click="tab = 0" class="px-3 py-1 text-sm font-bold transition duration-200 border border-transparent rounded-full font-display focus:outline-none hover:bg-gray-600 focus:bg-gray-600" :class="{ 'bg-gray-600 border-gray-500 border-opacity-20 shadow': tab === 0 }">
                            Migrations
                        </button>
                        <button x-on:click="tab = 1" class="px-3 py-1 text-sm font-bold transition duration-200 border border-transparent rounded-full font-display focus:outline-none hover:bg-gray-600 focus:bg-gray-600" :class="{ 'bg-gray-600 border-gray-500 border-opacity-20 shadow': tab === 1 }">
                            Model
                        </button>
                        <button x-on:click="tab = 2" class="px-3 py-1 text-sm font-bold transition duration-200 border border-transparent rounded-full font-display focus:outline-none hover:bg-gray-600 focus:bg-gray-600" :class="{ 'bg-gray-600 border-gray-500 border-opacity-20 shadow': tab === 2 }">
                            Controller
                        </button>
                        <button x-on:click="tab = 3" class="px-3 py-1 text-sm font-bold transition duration-200 border border-transparent rounded-full font-display focus:outline-none hover:bg-gray-600 focus:bg-gray-600" :class="{ 'bg-gray-600 border-gray-500 border-opacity-20 shadow': tab === 3 }">
                            Form request
                        </button>
                        <button x-on:click="tab = 4" class="px-3 py-1 text-sm font-bold transition duration-200 border border-transparent rounded-full font-display focus:outline-none hover:bg-gray-600 focus:bg-gray-600" :class="{ 'bg-gray-600 border-gray-500 border-opacity-20 shadow': tab === 4 }">
                            Index view
                        </button>
                        <button x-on:click="tab = 5" class="px-3 py-1 text-sm font-bold transition duration-200 border border-transparent rounded-full font-display focus:outline-none hover:bg-gray-600 focus:bg-gray-600" :class="{ 'bg-gray-600 border-gray-500 border-opacity-20 shadow': tab === 5 }">
                            Create view
                        </button>
                    </header>


                    <ul class="relative grid grid-cols-6 overflow-hidden transition duration-1000 max-h-96" :style="`transform: translateX(${tab / 6 * -100}%); width: calc(100% * 6);`">
                        <li class="w-full h-full p-3 overflow-auto">
            <pre><code class="language-php">class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create(&#039;projects&#039;, function (Blueprint $table) {
            $table-&gt;bigIncrements(&#039;id&#039;);
            $table-&gt;string(&#039;name&#039;)-&gt;nullable();
            $table-&gt;date(&#039;start_date&#039;)-&gt;nullable();
            $table-&gt;datetime(&#039;start_time&#039;)-&gt;nullable();
            $table-&gt;timestamps();
            $table-&gt;softDeletes();
        });
    }
}</code></pre>
                        </li>

                        <li class="w-full h-full p-3 overflow-auto">
            <pre><code class="language-php">class Project extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = &#039;projects&#039;;

    protected $appends = [
        &#039;logo&#039;,
    ];

    public static $searchable = [
        &#039;name&#039;,
    ];

    protected $dates = [
        &#039;start_date&#039;,
        &#039;start_time&#039;,
    ];

    protected $fillable = [
        &#039;name&#039;,
        &#039;start_date&#039;,
        &#039;start_time&#039;,
    ];
}
</code></pre>
                        </li>

                        <li class="w-full h-full p-3 overflow-auto">
            <pre><code class="language-php">class ProjectsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies(&#039;project_access&#039;), Response::HTTP_FORBIDDEN, &#039;403 Forbidden&#039;);

        $projects = Project::with([&#039;media&#039;])-&gt;get();

        return view(&#039;admin.projects.index&#039;, compact(&#039;projects&#039;));
    }

    public function create()
    {
        abort_if(Gate::denies(&#039;project_create&#039;), Response::HTTP_FORBIDDEN, &#039;403 Forbidden&#039;);

        return view(&#039;admin.projects.create&#039;);
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request-&gt;all());

        return redirect()-&gt;route(&#039;admin.projects.index&#039;);
    }

    // ... other methods
}
</code></pre>
                        </li>

                        <li class="w-full h-full p-3 overflow-auto">
            <pre><code class="language-php">class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows(&#039;project_create&#039;);
    }

    public function rules()
    {
        return [
            &#039;name&#039;       =&gt; [
                &#039;string&#039;,
                &#039;nullable&#039;,
            ],
            &#039;start_date&#039; =&gt; [
                &#039;date_format:&#039; . config(&#039;panel.date_format&#039;),
                &#039;nullable&#039;,
            ],
            &#039;start_time&#039; =&gt; [
                &#039;date_format:&#039; . config(&#039;panel.date_format&#039;) . &#039; &#039; . config(&#039;panel.time_format&#039;),
                &#039;nullable&#039;,
            ],
        ];
    }
}</code></pre>
                        </li>

                        <li class="w-full h-full p-3 overflow-auto">
            <pre><code class="language-php">@extends(&#039;layouts.admin&#039;)

                    @section(&#039;content&#039;)
                        @can(&#039;project_create&#039;)
                            &lt;div style=&quot;margin-bottom: 10px;&quot; class=&quot;row&quot;&gt;
                            &lt;div class=&quot;col-lg-12&quot;&gt;
                            &lt;a class=&quot;btn btn-success&quot; href=&quot;{{ route(&#039;admin.projects.create&#039;) }}&quot;&gt;
                            {{ trans(&#039;global.add&#039;) }} {{ trans(&#039;cruds.project.title_singular&#039;) }}
                            &lt;/a&gt;
                            &lt;/div&gt;
                            &lt;/div&gt;
                        @endcan
                        &lt;div class=&quot;card&quot;&gt;
                        &lt;div class=&quot;card-header&quot;&gt;
                        {{ trans(&#039;cruds.project.title_singular&#039;) }} {{ trans(&#039;global.list&#039;) }}
                        &lt;/div&gt;

                        &lt;div class=&quot;card-body&quot;&gt;
                        &lt;div class=&quot;table-responsive&quot;&gt;
                        &lt;table class=&quot; table table-bordered table-striped table-hover datatable datatable-Project&quot;&gt;
                        &lt;thead&gt;
                        &lt;tr&gt;
                        // Headers
                        &lt;/tr&gt;
                        &lt;/thead&gt;
                        &lt;tbody&gt;
                        @foreach($projects as $key =&gt; $project)
                            // ... Rows</code></pre>
                        </li>

                        <li class="w-full h-full p-3 overflow-auto">
            <pre><code class="language-php">@extends(&#039;layouts.admin&#039;)

                    @section(&#039;content&#039;)
                        &lt;div class=&quot;card&quot;&gt;
                        &lt;div class=&quot;card-header&quot;&gt;
                        {{ trans(&#039;global.create&#039;) }} {{ trans(&#039;cruds.project.title_singular&#039;) }}
                        &lt;/div&gt;

                        &lt;div class=&quot;card-body&quot;&gt;
                        &lt;form method=&quot;POST&quot; action=&quot;{{ route(&quot;admin.projects.store&quot;) }}&quot; enctype=&quot;multipart/form-data&quot;&gt;
                        @csrf
                        &lt;div class=&quot;form-group&quot;&gt;
                        &lt;label for=&quot;name&quot;&gt;{{ trans(&#039;cruds.project.fields.name&#039;) }}&lt;/label&gt;
                        &lt;input class=&quot;form-control {{ $errors-&gt;has(&#039;name&#039;) ? &#039;is-invalid&#039; : &#039;&#039; }}&quot; type=&quot;text&quot; name=&quot;name&quot; id=&quot;name&quot; value=&quot;{{ old(&#039;name&#039;, &#039;&#039;) }}&quot;&gt;
                        @if($errors-&gt;has(&#039;name&#039;))
                            &lt;div class=&quot;invalid-feedback&quot;&gt;
                            {{ $errors-&gt;first(&#039;name&#039;) }}
                            &lt;/div&gt;
                        @endif
                        &lt;span class=&quot;help-block&quot;&gt;{{ trans(&#039;cruds.project.fields.name_helper&#039;) }}&lt;/span&gt;
                        &lt;/div&gt;
                        // ... Other form fields</code></pre>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="flex flex-col items-center -my-24">
                    <div class="w-1/2 h-24 mr-24 border-b border-l border-gray-700 border-dashed rounded-bl-full">
                    </div>
                    <div class="w-1/2 h-24 ml-24 -mt-px border-t border-r border-gray-700 border-dashed rounded-tr-full">
                    </div>
                </div>
            </div>

            <div class="grid items-center gap-16 md:grid-cols-5">
                <article class="md:col-span-2">
                    <div class="flex items-center justify-center w-12 h-12 text-xl font-bold bg-gray-700 border border-gray-600 rounded-full shadow-xl font-display border-opacity-40">
                        3
                    </div>

                    <h2 class="mt-6 text-2xl font-bold tracking-tighter md:text-4xl font-display">Customize Anything</h2>

                    <p class="mt-2 text-base text-gray-400 md:text-xl">
                        Your project is made only of Laravel files. No QuickAdminPanel dependency. So modify the
                        generated code easily. Our team can provide support if necessary.
                    </p>
                </article>

                <div class="flex flex-col h-full md:col-span-3 bg-gray-700 border border-gray-600 shadow-xl rounded-2xl border-opacity-40 overflow-hidden">
                    <header class="flex items-center p-3 overflow-hidden border-b border-gray-800 whitespace-nowrap">
                        <p class="text-sm font-bold rounded-full font-display">Example articles on code
                            customizations</p>
                    </header>
                    <div class="grid gap-3 p-3 text-base md:grid-cols-2">
                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">
                                <a class="underline" href="https://helpdocs.quickadminpanel.com/customizing-the-code/datatables-customizations" target="_blank">Datatables Customizations</a>
                            </p>
                            <p class="text-sm text-gray-400">
                                Here you see a list of the articles on our blog, about various customizations of
                                Datatables. Buttons, reordering, background colors, etc.
                            </p>
                        </div>

                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">
                                <a class="underline" href="https://helpdocs.quickadminpanel.com/customizing-the-code/dependent-dropdowns-parent-child" target="_blank">Dependent Dropdowns: Parent-Child</a>
                            </p>
                            <p class="text-sm text-gray-400">
                                How to build, for example, Country-City relationship where change of Country value
                                refreshes the values of Cities.
                            </p>
                        </div>

                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">
                                <a class="underline" href="https://helpdocs.quickadminpanel.com/customizing-the-code/add-front-user-without-admin-permissions" target="_blank">Add a Front-end User</a>
                            </p>
                            <p class="text-sm text-gray-400">
                                What if you want to have a Simple front-end User as a front-end user, and they
                                wouldn't even see/access the admin panel?
                            </p>
                        </div>

                        <div class="p-3 bg-gray-600 border border-gray-500 rounded-lg shadow border-opacity-20">
                            <p class="text-base font-bold font-display">
                                <a class="underline" href="https://helpdocs.quickadminpanel.com/customizing-the-code/datatables-customizations" target="_blank">BelongsToMany: Add Fields to Pivot</a>
                            </p>
                            <p class="text-sm text-gray-400">
                                QuickAdminPanel has belongsToMany relationship field, but no extra columns in pivot
                                tables. This article shows the solution.
                            </p>
                        </div>

                        <footer class="md:col-span-2">
                            <p class="text-sm text-center text-gray-400">
                                <a href="https://blog.quickadminpanel.com" target="_blank" class="underline">Read
                                    more article on our blog</a>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="flex flex-col items-center -my-24">
                    <div class="w-1/2 h-24 ml-24 border-b border-r border-gray-700 border-dashed rounded-br-full">
                    </div>
                    <div class="w-1/2 h-24 mr-24 -mt-px border-t border-l border-gray-700 border-dashed rounded-tl-full">
                    </div>
                </div>
            </div>

            <section class="grid items-center justify-between grid-flow-row gap-6 p-6 bg-gray-700 border border-gray-600 shadow-xl md:gap-12 md:p-12 md:grid-flow-col rounded-2xl border-opacity-40">
                <header class="w-full">
                    <h2 class="text-2xl font-bold tracking-tighter md:text-4xl font-display">
                        Now it's <span class="relative z-10 inline-block">
    <span class="relative z-10 inline-block">your turn.</span>
    <span class="absolute inset-x-0 bottom-0 z-0 block w-full h-2 -mb-1 rounded-full shadow-md bg-gradient-to-br from-primary-500 to-primary-700"></span>
</span>
                        Start building in minutes.
                    </h2>

                    <p class="mt-2 text-base text-gray-400 md:text-xl">
                        Get started for free. No creditcard is required for the trial period.
                    </p>
                </header>

                <footer class="inline-grid grid-flow-row gap-4 md:gap-6 md:grid-flow-col">
                    <a class="button button--primary" href="register.html">Try for free</a>
                    <a class="button button--secondary-dark" href="demo-projects.html">See example projects</a>
                </footer>
            </section>
        </div>
    </div>
</section>

<section class="py-24 overflow-hidden bg-gray-50">
    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8">
        <header class="space-y-4 text-center">
            <p class="text-sm font-bold tracking-wider uppercase font-display text-primary-600">
                Testimonials
            </p>

            <h2 class="text-4xl font-bold tracking-tighter md:text-5xl font-display">
                See what our clients say.
            </h2>
        </header>

        <div class="grid gap-8 mt-16 md:grid-cols-3">
            <article class="relative p-8 transform bg-white shadow-xl md:translate-y-4 rounded-2xl -rotate-3">
                <blockquote class="space-y-6 twitter-tweet" data-conversation="none">
                    <p class="text-lg" lang="en" dir="ltr">
                        today buy a subscription for a year of quickadmin panel, it is wonderful I could make a test with the master-detail form and customize it to my liking in less than 1 hour Thank you very much, I really have saved a lot of time</p>
                    &mdash; Elbooz (@CursosElbooz) <a href="https://twitter.com/CursosElbooz/status/1382386751403130881?ref_src=twsrc%5Etfw">April 14, 2021</a>
                </blockquote>
                <script async="" src="widgets.js" charset="utf-8"></script>
            </article>
            <article class="relative p-8 transform bg-white shadow-xl md:-translate-y-4 rounded-2xl">
                <blockquote class="space-y-6 twitter-tweet">
                    <p class="text-lg" lang="en" dir="ltr">Our <a href="https://twitter.com/hashtag/dev?src=hash&ref_src=twsrc%5Etfw">#dev</a> team just saved 40h of programming for a client project just by using the <a href="https://twitter.com/QuickAdmin?ref_src=twsrc%5Etfw">@QuickAdmin</a>.<br><br>We were also able to show a demo to the client without any code, except for the deployment script.<a href="https://twitter.com/PovilasKorop?ref_src=twsrc%5Etfw">@PovilasKorop</a>, your generator is just amazing 👏! <a href="https://t.co/W7b1ZuI7It">pic.twitter.com/W7b1ZuI7It</a>
                    </p>- Agence Lex (@agence_lex) <a href="https://twitter.com/agence_lex/status/1379435885897248778?ref_src=twsrc%5Etfw">April 6, 2021</a>
                </blockquote>
                <script async="" src="widgets.js" charset="utf-8"></script>
            </article>
            <article class="relative p-8 transform bg-white shadow-xl md:translate-y-4 rounded-2xl rotate-3">
                <blockquote class="space-y-6 twitter-tweet" data-conversation="none">
                    <p class="text-lg" lang="en" dir="ltr">
                        Just saved a week of work or more with @QuickAdmin  😅<br>
                        Thank you @PovilasKorop  !!!
                    </p>
                    &mdash; Marc Garcia (@magarrent)
                    <a href="https://twitter.com/magarrent/status/1480538399949963266?ref_src=twsrc%5Etfw">
                        January 10, 2022
                    </a>
                </blockquote>
                <script async="" src="widgets.js" charset="utf-8"></script>
            </article>
        </div>

        <div class="grid gap-8 mt-16 md:grid-cols-3">
            <article class="relative p-8 transform bg-white shadow-xl md:translate-y-4 rounded-2xl -rotate-3">
                <blockquote class="space-y-6">
                    <p>
                    <div class="pb-2 italic">[...from email...]</div>
                    Thanks again for the excellent and super-quick response and support. I'm so glad I signed up for
                    the Quick Admin Panel service.


                    <footer class="flex items-center pt-6 space-x-4 border-t border-gray-100">
                        <img class="flex-shrink-0 border border-gray-200 rounded-full w-14 h-14" src="img/stephen-mcgloughlin.jpg" alt="">

                        <div>
                            <p class="text-xl font-bold font-display">Stephen McGloughlin</p>
                            <p class="text-base text-primary-600">
                                President, MediaQ.net
                            </p>
                        </div>
                    </footer>
                </blockquote>
            </article>
            <article class="relative p-8 transform bg-white shadow-xl md:-translate-y-4 rounded-2xl">
                <blockquote class="space-y-6">
                    <p>
                    <div class="pb-2 italic">[...from live-chat...]</div>
                    Completed the draft of the waste management system in under two weeks, saved me many hours of
                    fumbling around. For my next project I have no hesitation to use the admin panel again.



                    <footer class="flex items-center pt-6 space-x-4 border-t border-gray-100">
                        <img class="flex-shrink-0 border border-gray-200 rounded-full w-14 h-14" src="img/raymond-breen.jpg" alt="">

                        <div>
                            <p class="text-xl font-bold font-display">Raymond Breen</p>
                            <p class="text-base text-primary-600">
                                Developer, Corp Networking Limited, United Kingdom
                            </p>
                        </div>
                    </footer>
                </blockquote>
            </article>
            <article class="relative p-8 transform bg-white shadow-xl md:translate-y-4 rounded-2xl rotate-3">
                <blockquote class="space-y-6">
                    <p>
                        When I bought the package, I was very basic in Laravel Development but now I manage a team
                        of
                        Laravel Developers and we save a lot of time developing with QuickAdminPanel.
                        <br>
                        Support from the creator himself is the best I ever had from any service provider.
                    </p>

                    <footer class="flex items-center pt-6 space-x-4 border-t border-gray-100">
                        <img class="flex-shrink-0 border border-gray-200 rounded-full w-14 h-14" src="img/isaah-bin-mohammed.png" alt="">

                        <div>
                            <p class="text-xl font-bold font-display">Issah Bin Mohammed</p>
                            <p class="text-base text-primary-600">
                                President, <a class="underline" href="https://nanissa.com/" target="_blank">Nanissa
                                    Inc</a>, Lewes, Delaware
                            </p>
                        </div>
                    </footer>
                </blockquote>
            </article>
        </div>
    </div>
</section>

<section class="py-24" id="pricing">
    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8">
        <header class="space-y-4 text-center">
            <p class="text-sm font-bold tracking-wider uppercase font-display text-primary-600">
                Pricing
            </p>

            <h2 class="text-4xl font-bold tracking-tighter md:text-5xl font-display">
                Yearly Membership or One Quick Project?
            </h2>
        </header>

        <div class="grid items-center gap-16 mt-16 md:grid-cols-2">
            <div class="z-10 p-8 bg-white border-b-2 shadow-xl md:p-16 rounded-2xl border-primary-600">
                <header class="pb-8 border-b border-gray-200">
                    <h3 class="text-3xl font-bold tracking-tighter md:text-4xl font-display text-primary-600">
                        Yearly Plan
                    </h3>
                    <p class="mt-1 text-xl text-gray-500"><b>Yearly</b> payment, for unlimited panels.</p>

                    <p class="flex items-start mt-8">
                        <span class="text-xl text-gray-500">$</span>
                        <span class="text-5xl font-bold tracking-tighter md:text-7xl font-display">99.99</span>
                        <span class="ml-2 text-xl text-gray-500">/year</span>
                    </p>
                </header>

                <ul class="mt-8 space-y-4 text-base md:text-xl">
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>Unlimited Projects/Panels</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>Unlimited CRUD & Menus</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>All Modules and Functions</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>jQuery, Vue.js and Livewire generator versions</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>50% off <a href="https://laraveldaily.com/courses" target="_blank" class="underline">LaravelDaily Courses</a></p>
                    </li>
                </ul>


                <a class="button button--primary flex mt-8" href="register.html">Try for free</a>

                <footer class="p-4 mt-4 rounded-lg bg-gray-50">
                    <p class="text-sm text-gray-500">
                        You can also pay monthly for $14.99/month
                        <br>
                        (but that won't include Vue.js/Livewire versions and 50% off courses)
                    </p>
                </footer>
            </div>

            <div class="z-0 p-8 md:p-16">
                <header class="pb-8 border-b border-gray-200">
                    <h3 class="text-3xl font-bold tracking-tighter md:text-4xl font-display text-primary-600">One
                        Project</h3>
                    <p class="mt-1 text-xl text-gray-500"><b>One-time</b> payment, for one panel.</p>

                    <p class="flex items-start mt-8">
                        <span class="text-xl text-gray-500">$</span>
                        <span class="text-5xl font-bold tracking-tighter md:text-7xl font-display">29.99</span>
                    </p>
                </header>

                <ul class="mt-8 space-y-4 text-base md:text-xl">
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>Only One Project/Panel</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>Unlimited CRUD & Menus</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>All Modules and Functions</p>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-6 h-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <p>Only jQuery generator version</p>
                    </li>
                </ul>


                <a class="button button--primary flex mt-8" href="register.html">Try for free</a>
            </div>
        </div>
    </div>
</section>

<section class="relative py-24 -mt-24 overflow-hidden md:-mt-0">
    <div class="absolute inset-x-0 bottom-0 w-full bg-gray-50 h-1/2">
    </div>

    <div class="absolute inset-x-0 bottom-0 flex flex-col items-center">
        <img class="w-full max-w-4xl" src="images/hero-illustration.svg" alt="Illustration">
    </div>

    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8">
        <blockquote class="relative grid items-center bg-white shadow-xl md:grid-cols-3 rounded-xl">
            <img class="hidden object-cover w-full h-full rounded-l-xl md:block" style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);" src="img/pk.jpg" alt="Povilas Korop">

            <article class="relative p-6 md:p-8 md:col-span-2">
                <svg class="absolute top-0 right-0 hidden w-24 h-24 -mt-12 -mr-12 text-primary-600 md:block" width="256" height="256" viewbox="0 0 256 256" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M65.44 153.526V149.526H61.44H20.48C11.3675 149.526 4 142.163 4 133.105V51.4211C4 42.3628 11.3675 35 20.48 35H102.4C111.513 35 118.88 42.3628 118.88 51.4211V166.187C118.88 195.935 95.103 220.165 65.44 220.979V153.526ZM198.56 153.526V149.526H194.56H153.6C144.487 149.526 137.12 142.163 137.12 133.105V51.4211C137.12 42.3628 144.487 35 153.6 35H235.52C244.633 35 252 42.3628 252 51.4211V166.187C252 195.935 228.223 220.165 198.56 220.979V153.526Z" stroke="currentColor" stroke-width="8"></path>
                </svg>

                <div class="space-y-8">
                    <p class="text-base sm:leading-relaxed md:text-2xl">
                        Hi, I'm <a href="https://twitter.com/povilaskorop" target="_blank" class="underline">Povilas
                            Korop</a> - founder of QuickAdminPanel. As a Laravel developer, I am obsessed with
                        effectiveness and speed of development - so that clients get the first version of the
                        product as soon as possible.
                        <br><br>
                        I personally care a lot about this project, and I even answer most of the support queries
                        myself. Being both a developer and a client, I understand both worlds and try to apply that
                        knowledge to QuickAdminPanel.
                    </p>

                    <footer class="flex items-center space-x-4 md:space-x-0">
                        <img class="w-12 h-12 rounded-full md:hidden" src="img/pk.jpg" alt="">
                    </footer>
                </div>
            </article>
        </blockquote>
    </div>
</section>

<footer class="py-12 bg-gray-50" id="contact">
    <div class="w-full max-w-7xl px-4 mx-auto sm:px-8">
        <div class="flex flex-col items-center justify-center space-y-8">
            <div class="grid items-center w-full grid-flow-row gap-4 text-base font-medium text-center text-gray-600 md:grid-flow-col justify-evenly">
                <a class="font-bold transition text-primary-600 font-display hover:text-primary-500 focus:text-primary-700" href="register.html">Try for free</a>
                <a class="transition hover:text-gray-500 focus:text-gray-800" href="terms.html">Terms and Conditions</a>
                <a class="transition hover:text-gray-500 focus:text-gray-800" href="policy.html">Privacy Policy</a>
            </div>

            <p class="text-sm text-center text-gray-500">© 2015-2024 Created by Laravel Daily Team
                <br>
                Ateities 10a, Vilnius, Lithuania
                |
                +370 622 18617
                |
                <a href="mailto:info@laraveldaily.com">info@laraveldaily.com</a>
            </p>
        </div>
    </div>
</footer>

<script>
    function createMenu() {
        const $mobileNav = document.querySelector('#mobile-nav');

        const addOpenClasses = () => {
            $mobileNav.classList.remove('invisible', 'scale-95', 'translate-y-2', 'opacity-0');
            $mobileNav.classList.add('visible', 'scale-100', 'translate-y-0', 'opacity-100');
        }

        if (location.hash === '#menu-open') {
            addOpenClasses();
        }

        window.addEventListener('hashchange', () => {
            if (location.hash === '#menu-open') {
                addOpenClasses();
            } else {
                $mobileNav.classList.add('invisible', 'scale-95', 'translate-y-2', 'opacity-0');
                $mobileNav.classList.remove('visible', 'scale-100', 'translate-y-0', 'opacity-100');
            }
        })
    }

    function createObserver() {
        const $nav = document.querySelector('#nav');
        const $darkSections = document.querySelectorAll('.js-dark-section');

        const options = {
            root: null,
            rootMargin: "0px 0px -100% 0px",
        };

        const observer = new IntersectionObserver((entries) => {
            const entry = entries[0]

            if (entry.isIntersecting) {
                $nav.classList.add('text-white', 'bg-gray-800')
                $nav.classList.remove('text-gray-800', 'bg-white')
            } else {
                $nav.classList.add('text-gray-800', 'bg-white')
                $nav.classList.remove('text-white', 'bg-gray-800')
            }

        }, options);

        $darkSections.forEach(section => observer.observe(section))
    }

    createMenu();
    createObserver();

</script>
</body>

</html>
