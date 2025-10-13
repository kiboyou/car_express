<div>
    <img src="{{asset('source/images/Ellipse 1.png')}}" alt="photo de profil" />
    <p>{{ Auth::guard('personnel')->user()->username }}</p>
</div>
