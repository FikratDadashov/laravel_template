<form  action="{{url('store')}}" method="POST" >
    @csrf
    <label for="">Username <input type="text" name="username"></label><br>
    <label for="">Fullname <input type="text" name="fullname"></label><br>
    <label for="">Email <input type="email" name="email"></label><br>
    <label for="">Password <input type="password" name="password"></label><br>
    <input type="submit" value="Register">
</form>
