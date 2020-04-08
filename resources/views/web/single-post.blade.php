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
            <h4>Blog</h4>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="/">home</a></li>
              <li>\</li>
              <li><a href="/">blog</a></li>
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
        <div class="col-md-9 col-sm-8"> 
          
          <!-- left block Start  -->
          <div id="left">
            <div class="single-post-item">
              <div class="post-image"><img src="../../posts_image/{{$post->photo->file}}" alt=""></div>
              <div class="single-post-details">
                <div class="post-title">
                  <h4>{{$post->title}}</h4>
                </div>
                <div class="description">
                  <p>{{$post->body}} </p>
                  <br>
                  <div class="post-meta">
                    <div class="chat"> <a href="#"> <i class="fa fa-comment"></i> <span class="chat-number">324</span> </a> </div>
                    <div class="date"> <span class="date-month">{{$post->created_at ? $post->created_at->diffForHumans() : 'No data'}}</span> </div>
                    <div class="comments"> <a href="#"> <i class="fa fa-share"></i> <span class="comments-number">324</span> </a> </div>
                  </div>
                </div>
              </div>
            </div>
           
            <div class="comments-area">
              <h4>Comments<span>({{count($comments)}})</span></h4>
                  @if(Auth::user())
                    @if($comments)
                       @foreach($comments as $comment)
                 
              <ul class="comment-list ">

                <li>
                  <div class="comment-user"> <img src="/images/{{$comment->photo}}" alt="author"> </div>
                  <div class="comment-detail">
                    <h6>{{$comment->author}}</h6>
                    <div class="post-info">
                      <ul>
                        <li>{{$comment->created_at ?$comment->created_at->diffForHumans() :'' }}</li>
                        <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                      </ul>
                    </div>
                    <p>{{$comment->text}}</p>
                  </div>
                  <ul class="comment-list child-comment">
                   @if($comment->replies)
                   @foreach($comment->replies as $reply)
                    <li>
                      <div class="comment-user"> <img src="/images/{{$reply->comment->photo}}" alt="further"> </div>
                      <div class="comment-detail">
                        <h6>{{$reply->name}}</h6>
                        <div class="post-info">
                          <ul>
                            <li>{{$reply->created_at ? $reply->created_at->diffForHumans() : ''}}</li>
                            <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                          </ul>
                        </div>
                        <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                      </div>
                    </li>
                   
                  @endforeach
                  @endif
                  </ul>
                </li>
               
              </ul>
                     @endforeach
                  @endif
            </div>
            <div class="reply">
              <div class="Reply -title">
                <h4 class="tf">Leave a Comment </h4>
              </div>
              {!!Form::open(['method'=>'POST', 'action'=>'PostsCommentController@store'])!!}
                <div class="row">
                  <input type="hidden" name="post_id" value="{{$post->id}}">
                  <div class="col-md-12">
                    <div class="input-group">
                      <textarea placeholder="Comment *" id="textarea_message" name="text" class="form-control"></textarea>
                    </div>
                  </div>
                    <!-- /input-group -->
                    <div class="btn btn-large btn-primary">
                      <input type="submit" value="Post" name="submit">
                    </div>
                 
                </div>
              {!!Form::close()!!}
                @endif
            </div>
          </div>
          <!-- left block end  --> 
        </div>



        <div class="col-md-3 col-sm-4"> 
          <!-- right block Start  -->
          <div id="right">
            <div class="sidebar-widget">
              <div class="sidebar-title">
                <h4> Categories </h4>
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
                    <div class="item col-md-4">
                      <div class="image"><a href="{{route('blog.edit', $latest_blog->id)}}"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="../../posts_image/{{$latest_blog->photo->file}}"></a> </div>
                    </div>
                    <div class="item col-md-8">
                      <div class="blog-details">
                        <div class="blog-name">
                          <h5><a href="{{route('blog.edit', $latest_blog->id)}}">{{$latest_blog->title}} </a></h5>
                          <span class="blog-date">{{$latest_blog->created_at ? $latest_blog->created_at->diffForHumans() : ''}}</span> </div>
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
          
          <!-- right block end  --> 
        </div>
      </div>
    </div>
  </div>

@stop