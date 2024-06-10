<!-- resources/views/layouts/sidebar.blade.php -->
<div class="sidebar">
    <a href="/Dashboard">Home</a>
    <a href="/Profile">Profile</a>
    <a href="/users">Users</a>
    <a href="{{url('permissions')}}">Permissions</a>
    <a href="{{url('roles')}}">Roles</a>
    <a href="/Logout">Logout</a>
</div>

<style>
    .sidebar {
        width: 250px;
        background: #333;
        color: #fff;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding: 15px;
        display: flex;
        flex-direction: column;
    }
    .sidebar a {
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
    }
    .sidebar a:hover {
        background: #575757;
    }
    .content {
        margin-left: 260px;
        padding: 20px;
    }
</style>