@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<div class="containerMain">
    <nav class="mainNav">
        <ul class="mcd-menu">
			<li>
				<a href="{{ route('Main')}}">
					<i class="fa fa-home"></i>
					<strong>Home</strong>
				</a>
			</li>
			<li>
				<a href="{{ route('Topics') }}">
					<i class="fa fa-edit"></i>
					<strong>Tópicos</strong>
				</a>
			</li>
			<li>
				<a href="{{ route('Posts') }}">
					<i class="fa fa-gift"></i>
					<strong>Postagens</strong>
				</a>
			</li>
			<li>
				<a href="{{ route('Tags') }}">
					<i class="fa fa-globe"></i>
					<strong>Tags</strong>
				</a>
			</li>

		</ul>
    </nav>
    <main class="mainBody">
            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Card Title</div>
                        <a href="">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="projcard-tag">PHP</div>
                        <div class="projcard-subtitle">This explains the card in more detail</div>
                        <div class="projcard-bar"></div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                        <div class="projcard-tagbox">
                            <span class="projcard-tag">HTML</span>
                            <span class="projcard-tag">CSS</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Card Title</div>
                        <a href="">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="projcard-tag">PHP</div>
                        <div class="projcard-subtitle">This explains the card in more detail</div>
                        <div class="projcard-bar"></div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                        <div class="projcard-tagbox">
                            <span class="projcard-tag">HTML</span>
                            <span class="projcard-tag">CSS</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Card Title</div>
                        <a href="">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="projcard-tag">PHP</div>
                        <div class="projcard-subtitle">This explains the card in more detail</div>
                        <div class="projcard-bar"></div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                        <div class="projcard-tagbox">
                            <span class="projcard-tag">HTML</span>
                            <span class="projcard-tag">CSS</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projcard projcard-blue">
                <div class="projcard-innerbox">
                    <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
                    <div class="projcard-textbox">
                        <div class="projcard-title">Card Title</div>
                        <a href="">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="projcard-tag">PHP</div>
                        <div class="projcard-subtitle">This explains the card in more detail</div>
                        <div class="projcard-bar"></div>
                        <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                        <div class="projcard-tagbox">
                            <span class="projcard-tag">HTML</span>
                            <span class="projcard-tag">CSS</span>
                        </div>
                    </div>
                </div>
            </div>

	
    </main>
</div>
@endsection
