from django.shortcuts import render, HttpResponse
from datetime import datetime
from django.contrib import messages
from django.http import HttpResponse

# Create your views here.
def index(request):
    return render(request, 'index.html')
    # return HttpResponse("this is homepage")

def health(request):
    return render(request, 'health.html')
    # return HttpResponse("this is health-page")

def blogs(request):
    return render(request, 'blogs.html')

def blog_single(request):
    return render(request, 'blog-single.html')