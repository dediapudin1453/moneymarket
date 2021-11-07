<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php $this->CI->render_view('header'); ?>
<!-- End Header -->

<!-- 
*******************************************************
	Insert Content
******************************************************* 
-->

 <!-- Page Content -->
        <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <!-- content -->
                    <div class="content col-lg-9">
                        <!-- Blog -->
                        <div id="blog" class="single-post">
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="carousel dots-inside arrows-visible" data-items="1" data-lightbox="gallery">
                                        <a href="images/blog/16.jpg" data-lightbox="gallery-image">
                                            <img alt="image" src="<?php echo post_images($result_post['picture'],'',true);?>">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <h2><?php echo $result_post['post_title']?></h2>
                                        <div class="post-meta">

                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo ci_date($result_post['datepost'], 'l, d F Y');?> &nbsp; <i class="icon-clock"></i> <?php echo ci_date($result_post['timepost'], 'h:i A');?></span>
                                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i><?php echo $result_post['comment'];?> Comments</a></span>
                                            <!-- <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i>Lifestyle, Magazine</a></span> -->
                                            <span class="post-meta-category"><a href=""><i class="icon-eye"></i><?php echo $result_post['hits'];?> views</a></span>
                                           <!--  <div class="post-meta-share">
                                                <a class="btn btn-xs btn-slide btn-facebook" href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <span>Facebook</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-twitter" href="#" data-width="100">
                                                    <i class="fab fa-twitter"></i>
                                                    <span>Twitter</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-instagram" href="#" data-width="118">
                                                    <i class="fab fa-instagram"></i>
                                                    <span>Instagram</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:#" data-width="80">
                                                    <i class="far fa-envelope"></i>
                                                    <span>Mail</span>
                                                </a>
                                            </div> -->
                                        </div>
                                        <p><?php echo html_entity_decode($result_post['content']);?></p>

                                    </div>
                                    <div class="post-tags">
                                    	<?php
										$tags = explode(',', $result_post['tag']);
										if ( ! empty($result_post['tag']) && $tags > 0) {
											foreach ($tags as $tag) {
												$tag = seotitle($tag, NULL);
												$resTag = $this->CI->db->where('seotitle', $tag)->get('t_tag')->row_array();
												if ( $tag == $resTag['seotitle'] )
													echo '<a href="'.site_url('tag/'.$tag).'" rel="tag"># '.$resTag['title'].'</a>';
											}
										}
									?>
                                    </div>

                                    <div class="post-navigation">
                                        <a href="<?php echo $prev_post['url']?>"  class="post-prev">
                                            <div class="post-prev-title"><span>Previous Post</span><?php echo $prev_post['title']?></div>
                                        </a>
                                        <a href="blog-masonry-3.html" class="post-all">
                                    <i class="icon-grid"> </i></a>
                                        <a href="<?php echo $next_post['url']?>" class="post-next">
                                            <div class="post-next-title"><span>Next Post</span><?php echo $next_post['title']?></div>
                                        </a>
                                    </div>
                                    <!-- Comments -->

                                    <div class="comments" id="comments">
                                        <div class="comment_number">
                                            Comments <span>(<?php echo $result_post['comment']?>)</span>
                                        </div>
                                       	<!-- Comments List -->
							
								<?php
									$data_comments = $this->CI->db
										->where('id_post', $result_post['post_id'])
										->where('active != "N"')
										->where('parent = "0"', NULL, FALSE)
										->get('t_comment');

									foreach ($data_comments->result_array() as $comment):
										$usersa = $this->CI->db
											->select('id,photo')
											->where('id', $comment['id_user'])
											->get('t_user')
											->row_array();
								?>
								
									<div class="comment" id="comment-1">
										<div class="image"><img alt="" src="<?php echo user_photo($usersa['photo']);?>" class="avatar"></div>
                                        <div class="text">
                                            <h5 class="name"><?php echo $comment['name'];?></h5>
                                            <span class="comment_date">Posted at <?php echo ci_date($comment['date'],'d M Y, h:i A');?></span>
                                            <!-- <a class="comment-reply-link" href="#">Reply</a> -->
                                            <a href="#form_comment" class="comment-reply-link" data-parent="<?php echo encrypt($comment['id'])?>">Reply</a>
                                            <div class="text_holder">
                                                <p>
												<?php 
													if ($comment['active'] == 'X') {
														echo '<i class="text-danger">This comment is banned by Admin</i>';
													} else {
														echo auto_link($comment['comment']);
													}
												?>
											</p>
                                            </div>
                                        </div>
										
										<div class="clear"></div>
									</div>

									<!-- children -->
									<?php
										if ($comment['active'] != 'X'):
											
											$rep_comments = $this->CI->db
												->where('parent', $comment['id'])
												->where('active != "N"')
												->get('t_comment');

											foreach ($rep_comments->result_array() as $res_rep):
												$users_rep = $this->CI->db
													->select('id,photo')
													->where('id', $res_rep['id_user'])
													->where('active', 'Y')
													->get('t_user')
													->row_array();
									?>
									<ul class="children">
										<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">
											<div id="comment-3" class="comment-wrap clearfix">
												<div class="comment-meta">
													<div class="comment-author vcard">
														<span class="comment-avatar clearfix">
														<img src="<?php echo user_photo($users_rep['photo']);?>" class="avatar avatar-40 photo" height="40" width="40" /></span>
													</div>
												</div>
												<div class="comment-content clearfix">
													<div class="comment-author">
														<a href="#" rel="external nofollow" class="url"><?php echo $res_rep['name'];?></a>
														<span><a href="#"> <?php echo ci_date($res_rep['date'],'d M Y, h:i A');?></a></span>
													</div>
													<p>
														<?php 
															if ($res_rep['active'] == 'X') {
																echo '<i class="text-danger">This comment is banned by Admin</i>';
															} else {
																echo auto_link($res_rep['comment']);
															}
														?>
													</p>
													<!-- reply -->
													<a href="#form_comment" class="comment-reply-link reply_comment" data-parent="<?php echo encrypt($comment['id'])?>"><i class="icon-reply"></i></a>
												</div>
												<div class="clear"></div>
											</div>
										</li>
									</ul>
									<?php endforeach ?>
									<?php endif ?>
								<?php endforeach ?>
							<!--/ Comments List -->

							<div class="clear"></div>
                                    </div>
                                    <!-- end: Comments -->

                                    <div class="respond-form" id="respond">
                                        <div class="respond-comment">
                                            Leave a <span>Comment</span></div>
                                            <?php $this->alert->show('alert_comment'); ?>
                                       <!--  <form class="form-gray-fields"> -->
                                        	<?php echo form_open('','id="commentform" class="form-gray-fields clearfix"');?>
                                        	<input type="hidden" name="parent" class="comment_parent">
                                        	<?php if ( login_status('member') == TRUE ): ?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="upper" for="name">Nama</label>
                                                        <input class="form-control required" name="name" placeholder="Nama " id="name" aria-required="true" type="text" value="<?php echo data_login('member', 'name')?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="upper" for="email">Email</label>
                                                        <input class="form-control required email" name="email" placeholder="Masukan email" id="email" aria-required="true" type="email" value="<?php echo data_login('member', 'email')?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            	 <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="upper" for="name">Nama</label>
                                                        <input class="form-control required" name="name" placeholder="Nama " id="name" aria-required="true" type="text" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="upper" for="email">Email</label>
                                                        <input class="form-control required email" name="email" placeholder="Masukan email" id="email" aria-required="true" type="email" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="upper" for="comment">Your comment</label>
                                                        <textarea class="form-control required" name="comment" rows="9" placeholder="Enter comment" id="comment" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group text-center">
                                                        <button class="btn" type="submit">Submit Comment</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if ($this->CI->captcha() == TRUE): ?>
											<div class="g-recaptcha pull-right" data-sitekey="<?php echo $this->settings->website('recaptcha_site_key')?>" style="margin-bottom:5px;"></div>
											<script src='https://www.google.com/recaptcha/api.js'></script>
											<?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post single item-->
                        </div>

                    </div>
                    <!-- end: content -->

                    <!-- Sidebar-->
                   <!--  <div class="sidebar sticky-sidebar col-lg-3">
                            <div class="widget">                        
                            	<div class="tabs">
	                                <ul class="nav nav-tabs" id="tabs-posts" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Popular</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="false">Recent</a>
	                                    </li>
	                                </ul>
                                <div class="tab-content" id="tabs-posts-content">
                                    <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                                        <div class="post-thumbnail-list">
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/5.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">A true story, that never been told!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/6.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/7.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">The most happiest time of the day!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                        <div class="post-thumbnail-list">
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/6.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/7.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">The most happiest time of the day!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/8.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">New costs and rise of the economy!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                                        <div class="post-thumbnail-list">
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/7.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">The most happiest time of the day!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/8.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">New costs and rise of the economy!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/6.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 24h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="widget  widget-tags">
                                <h4 class="widget-title">Tags</h4>
                                <div class="tags">
                                    <a href="#">Design</a>
                                    <a href="#">Portfolio</a>
                                    <a href="#">Digital</a>
                                    <a href="#">Branding</a>
                                    <a href="#">HTML</a>
                                    <a href="#">Clean</a>
                                    <a href="#">Peace</a>
                                    <a href="#">Love</a>
                                    <a href="#">CSS3</a>
                                    <a href="#">jQuery</a>
                                </div>
                            </div>
                    </div> -->
                    <?php $this->CI->render_view('sidebar'); ?>
                    <!-- end: Sidebar-->
                </div>
            </div>
        </section>
        <!-- end: Page Content -->
<!-- End Content -->

<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php $this->CI->render_view('footer'); ?>
<!-- End Footer -->