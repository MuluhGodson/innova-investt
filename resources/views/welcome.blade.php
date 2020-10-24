<x-guest-layout>
		<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
	      <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
	        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
	          	<div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('menu')">
	            	<i class="text-white fas fa-bars"></i>
	          	</button>
	        </div>

	        <div class="lg:flex flex-grow items-center bg-black lg:bg-transparent lg:shadow-none hidden" id="menu">
	          <ul class="flex flex-col lg:flex-row list-none mr-auto">
	            <li class="flex items-center">
	              <a class="lg:text-white lg:hover:text-gray-300 text-gray-200 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"href="{{ route('dashboard') }}">    
	                Browse
	               </a> 
	            </li>
	            <li class="flex items-center">
	              <a class="lg:text-white lg:hover:text-gray-300 text-gray-200 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"href="https://jobs.innova.cm" target="_blank">    
	                Jobs
	               </a> 
	            </li>
	            <li class="flex items-center">
	              <a class="lg:text-white lg:hover:text-gray-300 text-gray-200 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"href="https://innova.cm" target="_blank">    
	                Courses
	               </a> 
	            </li>
	          </ul>
	          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
	            {{--<li class="flex items-center">
	              <a
	                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
	                href="#pablo"
	                ><i
	                  class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "
	                ></i
	                ><span class="lg:hidden inline-block ml-2">Share</span></a
	              >
	            </li>
	            <li class="flex items-center">
	              <a
	                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
	                href="#pablo"
	                ><i
	                  class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "
	                ></i
	                ><span class="lg:hidden inline-block ml-2">Tweet</span></a
	              >
	            </li>--}}
	            <li class="flex items-center">
                	<x-jet-nav-link href="{{ route('register')}}" class="pt-2 text-gray-200 pb-2">
                        {{ __('Register') }}
                    </x-jet-nav-link>
	            </li>
	            <li class="flex items-center sm:my-3">
                	<x-jet-nav-link style="transition: all 0.15s ease 0s;" href="{{ route('login')}}" class="bg-primary text-center mx-2 pt-2 pb-2 px-3 rounded">
                        {{ __('Invest Now') }}
                    </x-jet-nav-link>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </nav>

        <!-- Landing -->
        <section>
        	<main>
		      <div class="relative pt-16 pb-5 flex content-center items-center justify-center" style="min-height: 75vh;">		       		    
		        <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("{{ asset('building.jpg') }}");'>		          		              
		          <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>		          
		        </div>
		        <div class="container relative mx-auto">
		          <div class="items-center flex flex-wrap">
		            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
		              <div class="pr-12">
		                <h1 class="text-white uppercase text-4xl text-center font-semibold md:text-5xl lg:text-5xl">
		                  Orbit <span class="text-primary">Investments</span>
		                </h1>
		                <blockquote class="lg:mt-4 md:mt-4 mt-1 text-lg text-center text-gray-300">
		                  "It's not how much money you make, but how much money you keep, how hard it works for you, and how many generations you keep it for." <cite>Robert Kiyosaki</cite> 
		                </blockquote>
		                <x-jet-nav-link style="transition: all 0.15s ease 0s;" href="{{ route('login')}}" class="bg-primary font-bold mt-3 text-center mx-2 pt-2 pb-2 px-3 rounded">
                        	{{ __('Start Investing') }}
                    	</x-jet-nav-link>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden" style="height: 70px; transform: translateZ(0px);">		          		        
		          <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0"><polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon></svg>         
		        </div>
		      </div>

		      <section class="pb-5 bg-black -mt-24">
		        <div class="container mx-auto px-4">
		          <div class="flex flex-wrap">
		            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
		              <div class="relative flex flex-col min-w-0 break-words bg-dark w-full mb-8 shadow-lg rounded-lg">    
		                <div class="px-4 py-5 flex-auto">
		                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-primary">		                    		                  
		                    <i class="fas fa-money-bill"></i>
		                  </div>
		                  <h6 class="text-xl font-semibold">Reach financial goals</h6>
		                  <p class="mt-2 mb-4 text-gray-400">
		                   Investing can help you reach big financial goals. If your money is earning a higher rate of return than a savings account, you will be earning more money both over the long term and within a faster period.
		                  </p>
		                </div>
		              </div>
		            </div>

		            <div class="w-full md:w-4/12 px-4 text-center">
		              <div class="relative flex flex-col min-w-0 break-words bg-dark w-full mb-8 shadow-lg rounded-lg">		                
		                <div class="px-4 py-5 flex-auto">
		                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">	                    	                  
		                    <i class="fas fa-expand-arrows-alt"></i>
		                  </div>
		                  <h6 class="text-xl font-semibold">Start and expand a business</h6>
		                  <p class="mt-2 mb-4 text-gray-400">
		                    Investing is an important part of business creation and expansion. Many investors like to support entrepreneurs and contribute to the creation of new jobs and new products.
		                  </p>
		                </div>
		              </div>
		            </div>

		            <div class="pt-5 w-full md:w-4/12 px-4 text-center">
		              <div class="relative flex flex-col min-w-0 break-words bg-dark w-full mb-8 shadow-lg rounded-lg">       		            
		                <div class="px-4 py-5 flex-auto">
		                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">            		                  
		                    <i class="fas fa-glass-cheers"></i>
		                  </div>
		                  <h6 class="text-xl font-semibold">Be part of a new venture</h6>
		                  <p class="mt-2 mb-4 text-gray-400">
		                    New ventures need the backing of money, and they look to investors for that backing. Some investors like the excitement of investing in a new, cutting-edge product or service that introduces them to a glamorous world.
		                  </p>
		                </div>
		              </div>
		            </div>
		          </div>

		          <div class="flex flex-wrap items-center mt-10">
		            <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
		              <div class="text-gray-200 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">               	              
		                <i class="fas fa-user-friends text-xl"></i>
		              </div>
		              <h3 class="text-3xl mb-2 font-semibold leading-normal">
		                Working with us is a pleasure
		              </h3>
		              <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-400">
		              In order to grow your money, you need to put it in a place where it can earn a high rate of return. The higher the rate of return, the more money you will earn. Orbit Investments is an investment vehicle offering you the opportunity to earn higher rates of return than savings accounts. Therefore, if you want the chance to earn a higher return on your money, you will need to explore investing your money.
		              A few people may stumble into financial security. But for most people, the only way to attain financial security is to save and invest over a long period of time. You just need to have your money work for you. That’s investing. And we can help.               	              
		              </p>
		              <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-400">		                
		                We provide one of the simplest investment models. Browse through all projects and select the ones you find interesting. You buy shares and that's it. You don't even have to pay immediately for your shares. We do accept a variety of payment methods including Mobile Money, Bank Wires, Bitcoin etc.
		              </p>
		              <a href="{{ route('dashboard') }}" class="underline font-bold text-primary mt-8"> 
		                Check investible projects
		              </a>	              
		            </div>

		            <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
		              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-green-600"> 	       
		                <img alt="Photo by Ketut Subiyanto from Pexels" src="{{ asset('family.jpg') }}" class="w-full align-middle rounded-t-lg"/>  
		                <blockquote class="relative p-8 mb-4">
		                  <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block" style="height: 95px; top: -94px;"><polygon points="-30,95 583,95 583,65" class="text-primary fill-current"></polygon></svg>		                  
		                  <h4 class="text-xl font-bold text-white">
		                    High profit yield Investments
		                  </h4>
		                  <p class="text-md font-light mt-2 text-white">
		                    Investing in yourself is one of the major keys to success. You should invest your time, effort, money, and actions in activities and investments that will yield a profitable return in the future. Invest for you family.
		                  </p>
		                </blockquote>
		              </div>
		            </div>
		          </div>
		        </div>
		      </section>


		      <section class="relative py-10">
		        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px; transform: translateZ(0px);">     		        
		          <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0"><polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon></svg>   
		        </div>
		        <div class="container mx-auto px-4">
		          <div class="items-center flex flex-wrap">
		            <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
		              <img alt="Photo by CDC on Unsplash" class="max-w-full rounded-lg shadow-lg" src="{{ asset('smile.jpg') }}"/>
		            </div>
		            <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
		              <div class="md:pr-12">
		                <div class="text-green-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-green-300">   
		                  <i class="fas fa-rocket text-xl"></i>
		                </div>
		                <h3 class="text-3xl font-semibold">Investing with Orbit <span class="text-primary">Investments</span></h3>
		                <p class="mt-4 text-lg leading-relaxed text-gray-400">
		                  You'll see a predictable and measurable, growth in profits. As you are working, you should be saving money for retirement, childrens university cost etc. Put some of your savings into a portfolio of investments, such as stocks, bonds, mutual funds, real estate, businesses, etc. Then, at retirement age, you can live off funds earned from these investments and also guarantee a healthy future for your children.
		                </p>
		                <ul class="list-none mt-6">

		                  <li class="py-2">
		                    <div class="flex items-center">
		                      <div>
		                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200 mr-3"
		                          ><i class="fas fa-search"></i></span>	                          
		                      </div>
		                      <div>
		                        <h4 class="text-gray-200">
		                          Find a project
		                        </h4>
		                      </div>
		                    </div>
		                  </li>

		                  <li class="py-2">
		                    <div class="flex items-center">
		                      <div>
		                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200 mr-3"><i class="fas fa-shopping-basket"></i></span>	                          
		                      </div>
		                      <div>
		                        <h4 class="text-gray-200">Buy shares</h4>
		                      </div>
		                    </div>
		                  </li>

		                  <li class="py-2">
		                    <div class="flex items-center">
		                      <div>
		                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200 mr-3"><i class="fas fa-money-bill"></i></span>          
		                      </div>
		                      <div>
		                        <h4 class="text-gray-200">Earn!!</h4>
		                      </div>
		                    </div>
		                  </li>

		                </ul>
		              </div>
		            </div>
		          </div>
		        </div>
		      </section>
		      <section class="pt-10 pb-12">
		        <div class="container mx-auto px-4">
		          <div class="flex flex-wrap justify-center text-center mb-24">
		            <div class="w-full lg:w-6/12 px-4">
		              <h2 class="text-4xl font-semibold">Find <span class="text-primary">Inspiration</span></h2>
		              <p class="text-lg leading-relaxed m-4 text-gray-400">
		                <blockquote>“Investing should be more like watching paint dry or watching grass grow. If you want excitement, take $800 and go to Las Vegas.”</blockquote> — <cite>Paul Samuelson</cite>
		              </p>
		            </div>
		          </div>
		          <div class="flex flex-wrap">

		          	<div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
		              <div class="px-6">
		                <img alt="Aliko Dangote" src="{{ asset('aliko.jpg') }}" class="shadow-lg rounded-full max-w-full mx-auto" style="max-width: 120px;"/>
		                <div class="pt-6 text-center">
		                  <h5 class="text-xl font-bold">Aliko Dangote</h5>
		                  <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
		                    Richest man in Africa - Started his business empire from investing in commodities such as sugar, salt, and flour.
		                  </p>		                  
		                </div>
		              </div>
		            </div>

		            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
		              <div class="px-6">
		                <img alt="Warren Buffett" src="{{ asset('warren.jpeg') }}" class="shadow-lg rounded-full max-w-full mx-auto" style="max-width: 120px;"/>
		                <div class="pt-6 text-center">
		                  <h5 class="text-xl font-bold">Warren Buffett</h5>
		                  <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
		                    Grew his wealth by investing and buying shares based on their merits to produce cash flow long into the future.
		                  </p>
		                </div>
		              </div>
		            </div>

		            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
		              <div class="px-6">
		                <img alt=".Tony Elumelu" src="{{ asset('tony.jpeg') }}" class="shadow-lg rounded-full max-w-full mx-auto" style="max-width: 120px;"/>
		                <div class="pt-6 text-center">
		                  <h5 class="text-xl font-bold">Tony Elumelu</h5>
		                  <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
		                    Made his wealth from leading a group of investors in taking over a commercial bank in Lagos. Within a few years, he merged it with UBA bank in 2005. It now has subsidiaries in 20 African countries and in the U.S and U.K.
		                  </p>
		                </div>
		              </div>
		            </div>

		            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
		              <div class="px-6">
		                <img alt="Robert Kiyosaki" src="{{ asset('robert.jpg') }}" class="shadow-lg rounded-full max-w-full mx-auto" style="max-width: 120px;"/>
		                <div class="pt-6 text-center">
		                  <h5 class="text-xl font-bold">Robert Kiyosaki</h5>
		                  <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
		                    He launched Cashflow Technologies, Inc., a business and financial education company that owns and operates the Rich Dad and Cashflow brands. He is a best selling author.
		                  </p>
		                </div>
		              </div>
		            </div>

		          </div>
		        </div>
		      </section>

		      <section class="pb-5 relative block bg-black">
		        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px; transform: translateZ(0px);">
		          <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1"  viewBox="0 0 2560 100" x="0" y="0">      
		            <polygon class="text-gray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>            
		          </svg>
		        </div>
		        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
		          <div class="flex flex-wrap text-center justify-center">
		            <div class="w-full lg:w-6/12 px-4">
		              <h2 class="text-4xl font-semibold text-white">Browse <span class="text-primary">Projects</span> </h2>
		              <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-400">
		                Below are a few projects, click <span class="text-primary"><a href="{{ route('dashboard') }}">here</a></span> to view more projects. 
		              </p>
		            </div>
		          </div>
		          <div class="flex flex-wrap mt-12 justify-center">

		            <div class="mt-8 grid justify-between grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 md:grid-cols-2 gap-3">
						@foreach($projects as $project)
							<div class="transition rounded duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-10 max-w-sm mx-4 self-start my-2 bg-dark overflow-hidden">
							  	<img class="w-full" src="/storage/projects/photos/{{$project->image}}" alt="{{$project->name}}">
							  	<div class="px-6 pt-4">
							    	<div class="font-bold text-xl text-primary mb-2">{{$project->name}}</div>   
							  	</div>
							  	<div class="p-2">
							  		<span class="text-sm font-bold text-green-400">Estimated Profits per 1%: {{$project->share_rate * $project->min_profit}} FCFA</span><br>
	        						<span class="text-sm font-bold text-green-400">Profit Growth Duration: {{$project->profit_duration}}</span><br>
							  	</div>
							  	
							  	<div class="px-6 flex py-2">
							  		@foreach($project->categories as $category)
								    	<small class="inline-block text-xs font-semibold text-gray-200 mr-2">{{$category->name}}</small>
								    @endforeach
							  	</div>
							  	<div class="flex justify-center">
							  		@if($project->shares->available_shares > 0)
								  		<a class="rounded bg-primary hover:bg-gray-800 active:bg-gray-100 object-center my-2 py-1 px-2" href="{{ route('project.show', $project->slug) }}">INVEST
								  		</a>
							  		@endif
							  	</div>
							</div>
						@endforeach
					</div>
		            
		          </div>
		        </div>
		      </section>

		      {{--<section class="relative block py-24 lg:pt-0 bg-black">
		        <div class="container mx-auto px-4">
		          <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
		            <div class="w-full lg:w-6/12 px-4">
		              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-black">	                
		                <div class="flex-auto p-5 lg:p-10">
		                  <h4 class="text-2xl font-semibold">Have a question?</h4>
		                  <p class="leading-relaxed mt-1 mb-4 text-gray-600">
		                    Complete this form and we will get back to you in 24 hours.
		                  </p>

		                  <div class="relative w-full mb-3 mt-8">
		                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="full-name">Full Name</label>    
		                    <input type="text" class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" placeholder="Full Name" style="transition: all 0.15s ease 0s;"/>    
		                  </div>

		                  <div class="relative w-full mb-3">
		                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="email">Email</label>
                    		<input type="email" class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" placeholder="Email" style="transition: all 0.15s ease 0s;"
		                    />        
		                  </div>

		                  <div class="relative w-full mb-3">
		                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="message">Message</label>
		                   <textarea rows="4" cols="80" class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" placeholder="Type a message..."></textarea>	                    
		                  </div>
		                  <div class="text-center mt-6">
		                    <button class="bg-primary text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all 0.15s ease 0s;">    
		                      Send Message
		                    </button>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </section> --}}
		    </main>
        </section>
    </div>
    <script>
	    function toggleNavbar(menu) {
	      document.getElementById('menu').classList.toggle("hidden");
	      document.getElementById('menu').classList.toggle("block");
	    }
  </script>
</x-guest-layout>