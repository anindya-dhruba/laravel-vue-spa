<template>
    <div class="container">
        <h1>Join a room !</h1>
        <ul class="navbar-nav ml-auto">
            <router-link :to="{name: 'room'}" tag="li" class="nav-item" activeClass="active">
                <a class="nav-link">Room n°1</a>
            </router-link>
        </ul>
    </div>
</template>
