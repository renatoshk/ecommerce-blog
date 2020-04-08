@extends('layouts.webi.index')
@section ('content')
 <!-- offer block Start  -->
  <div id="offer">
    <div class="container">
      <div class="offer">
        <p>30 New Mega Sales. Upto 80% Off. Starting Everyday at 9 AM.</p>
      </div>
    </div>
  </div>
  <!-- offer block end  --> 
  
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div class="page-title">
            <h4>Blog Page</h4>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">home</a></li>
              <li>\</li>
              <li><a href="/blog">blog</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="blog-page-contain">
    <div class="container">
      <div class="row"> 
        <!-- left block Start  -->
        <div class="col-md-9">
          <div id="left">
            @if($posts)
            @foreach($posts as $post)
            <div class="post-item">
              <div class="row">
                <div class="col-md-5">
                  <div class="post-image"> <a href="{{route('blog.edit', $post->id)}}"><img src="../posts_image/{{$post->photo->file}}" alt=""></a> </div>
                </div>
                <div class="col-md-7">
                  <div class="content-details">
                    <div class="post-title">
                      <h3><a href="{{route('blog.edit', $post->id)}}">{{$post->title}}</a></h3>
                    </div>
                    <br>  
                    <div class="description">
                      <p>{{ \Illuminate\Support\Str::limit($post->body, 500) }}</p>
                      <div class="post-meta">
                        <div class="chat"><a href="#"><i class="fa fa-comment"></i><span class="chat-number"> 324</span></a> </div>
                        <div class="date"><span class="date-month">Jan</span><span class="date-day"> 16</span><span class="date-year">2015</span> </div>
                        <div class="comments"><a href="#"><i class="fa fa-share"></i><span class="comments-number"> 324</span></a></div>
                      </div>
                      <div class="read-more"> <a href="{{route('blog.edit', $post->id)}}" class="read-more">read more <i class="fa fa-long-arrow-right"></i></a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
           @endif
            </div>
            {{$posts->links()}}
          </div>
        </div>
        <!-- left block end  --> 
        
        <!-- right block Start  -->
        <div class="col-md-3">
          <div id="right">
            <div class="sidebar-widget">
              <div class="sidebar-title">
                <h4> Categories</h4>
              </div>
              <ul class="title-toggle">
                @if($categories)
                @foreach($categories as $category)
                <li><a href="{{route('blog.show',$category->id)}}">{{$category->name}}</a></li>
              @endforeach
              @endif
              </ul>
            </div>
          
            <div class="sidebar-widget latest-blog">
              <div class="sidebar-title">
                <h4>Latest blog</h4>
              </div>
              <ul class="title-toggle">
                @if($latest_blogs)
                @foreach($latest_blogs as $latest_blog)
                <li>
                  <div class="blog-post ">
                    <div class="item col-md-4 col-xs-4">
                      <div class="image"><a href="{{route('blog.edit', $latest_blog->id)}}"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="../posts_image/{{$latest_blog->photo->file}}"></a> </div>
                    </div>
                    <div class="item col-md-8 col-xs-8">
                      <div class="blog-details">
                        <div class="blog-name">
                          <h5><a href="blog.html">{{$latest_blog->title}}</a></h5>
                          <span class="blog-date">{{$latest_blog->created_at ? $latest_blog->created_at->diffForHumans() : 'No data'}}</span> </div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
              {{$latest_blogs->links()}}
            </div>
          </div>
        </div>
        <!-- left block end  --> 
      </div>
    </div>
  </div>
  
@stop