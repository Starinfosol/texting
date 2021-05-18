from django.contrib import admin
from django.urls import path
from home import views

urlpatterns = [
    path("", views.index, name='home'),
    path("health", views.health, name='health'),
    path("blogs", views.blogs, name='blogs'),
    path("blog-single", views.blog_single, name='blog-single'),
   # path("login", views.login, name='login'),
   # path("signup", views.signup, name='signup'),
    
    ]