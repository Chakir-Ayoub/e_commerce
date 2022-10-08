@extends('layouts.layout')

@section('content')

    <div class="div1">
    	<h2>Inscription</h2><br><br>
        <form action="#">
            <span class="span1">Nom*</span><br> 
            <input type="text" class="txt1"><br><br>
            <span class="span1">Prénom*</span><br> 
            <input type="text" class="txt1"><br><br>
            <span class="span1">Nom d'utilisateur*</span><br> 
            <input type="text" class="txt1"><br><br>
        	<span class="span1">Adresse e-mail*</span><br> 
        	<input type="text" class="txt1"><br><br>
        	<span class="span1">Mot de passe*</span><br>
        	<input type="password" class="txt1"><br><br>
            <input type="submit" value="Connexion" class="btn1"><br><br>
        	<a href="../Login" class="a1">OU CONNEXION</a>
        </form>
    </div>

@endsection