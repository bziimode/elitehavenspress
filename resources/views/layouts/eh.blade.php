@include('layouts.inc.front-header')
<body id="hp">
    <!-- <div class="container">   
		<div id="advisory" style="width:100%;  padding:3px; color:#FFF!important; font-size:14px; z-index: 999999; background:#000!important; text-align:center">
			<div>
				<div class="covid" style="">
					<a href="/coronavirus-cancellation-policy" style="color:#fff; text-decoration:none;"><img src="//cimages.elitehavens.com/images/portals/eh2/i-icon.png" style="vertical-align:middle" alt="" /> <div>UPDATE ON COVID-19 POLICY - <u>FIND OUT MORE</u></div></a></div>
            </div>
        </div>
    </div> -->
    <main>

        @yield('content')

    </main>
    
	@include('layouts.inc.front-navbar')
		
	@include('layouts.inc.front-search')
    
    <section class="press">
		<div class="wrapper">
			<h1>In the press.</h1>
			<img src="{{ asset('uploads') }}/2022/03/In-the-Press.jpg" width="100%" class="alignnone" />

			<div class="search-form">
                <form action="{{ url('/main/search') }}" method="post" id="frmSearch" role="search">
					{{ csrf_field() }}
                    <input type="text" name="txtSearch" id="txtSearch" placeholder="Search article title" value="" autocomplete='off'><button type="submit" class="search-btn" id="searchEntry" name="searchEntry"><i class="fas fa-search"></i></button>
                    <div id="divtxtSearch"></div>
					<a class="back-to-home" onclick="document.location.href='/';">Back to Home</a>
                </form>
            </div>
            @if (@$pressContents)
                
                @foreach($pressContents as $pContents)
                    <div class="content">
                        <div class="group right-content">
                            <div class="half">
                                <img src="{{ asset('uploads/'.$pContents->thumbnail) }}" alt="">
                            </div>
                            <div class="half">
                                <h3>{!! $pContents->title !!}</h3>
                                <p>{!! $pContents->description !!}</p>
                            </div>
                        </div>
                        <div class="group bottom-content">
                            <div class="half">
                            <a href="{{ asset('uploads/'.$pContents->filename) }}" target="_blank">Download Complete Article</a>
                            </div>
                            <div class="half">
                                @if( !empty($pContents->publish_date) )
                                <p class="published">Published: {!! date("d M Y", strtotime($pContents->publish_date)) !!}</p>
                                @endif
                                @if( !empty($pContents->author) )
                                <p class="author">Author: {!! $pContents->author !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
			@endif
		</div>
		<div class="btn">
			<button class="btn-default" id="loadMore" rel="next">Load more</button>
		</div> 
	</section>

@include('layouts.inc.front-newsletter')
@include('layouts.inc.front-footer')