<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Sidebar-->
<div class="sidebar sticky-sidebar col-lg-3">
    <!--widget newsletter-->
   <!--  <div class="widget  widget-newsletter">
        <form id="widget-search-form-sidebar" action="search-results-page.html" method="get" class="form-inline">
            <div class="input-group">
                <input type="text" aria-required="true" name="q" class="form-control widget-search-form" placeholder="Search for pages...">
                 <div class="input-group-append">
                    <span class="input-group-btn">
                    <button type="submit" id="widget-widget-search-form-button" class="btn"><i class="fa fa-search"></i></button> 
                    </span>
                </div> 
            </div>
        </form>
    </div> -->
    <!--end: widget newsletter-->

                        <!--Tabs with Posts-->
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
                                            <!-- start -->
                                                <?php
                                                        $sidebar_latest = $this->CI->db
                                                            ->select('id_category,title,seotitle,picture,datepost,timepost,hits')
                                                            ->where('active','Y')
                                                            ->order_by('id','DESC')
                                                            ->limit(5)
                                                            ->get('t_post')
                                                            ->result_array();
                                                        foreach ($sidebar_latest as $row_slatest):
                                                            $pop_category = $this->CI->db
                                                                ->select('title,seotitle')
                                                                ->where('id',$row_slatest['id_category'])
                                                                ->get('t_category')
                                                                ->row_array();
                                                    ?>
                                            <div class="post-thumbnail-entry">
                                                <img alt="<?=post_url($row_slatest['seotitle']);?>" title="<?=$row_slatest['title'];?>" src="<?=post_images($row_slatest['picture'], 'thumb', TRUE);?>">
                                                <div class="post-thumbnail-content">
                                                    <a href="<?=post_url($row_slatest['seotitle']);?>" title="<?=$row_slatest['title'];?>"><?=$row_slatest['title'];?></a>
                                                    <span class="post-date"><i class="far fa-clock"></i> 6m ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            <!-- end -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                                        <!--  -->
                                               
                                                <div class="post-thumbnail-list">
                                                     <?php
                                                    $sidebar_latest = $this->CI->db
                                                        ->select('id_category,title,seotitle,picture,datepost,timepost,hits')
                                                        ->where('active','Y')
                                                        ->order_by('id','DESC')
                                                        ->limit(5)
                                                        ->get('t_post')
                                                        ->result_array();
                                                    foreach ($sidebar_latest as $row_slatest):
                                                        $pop_category = $this->CI->db
                                                            ->select('title,seotitle')
                                                            ->where('id',$row_slatest['id_category'])
                                                            ->get('t_category')
                                                            ->row_array();
                                                ?>
                                                    <div class="post-thumbnail-entry">
                                                        <img alt="" src="<?=post_images($row_slatest['picture'], 'thumb', TRUE);?>">
                                                        <div class="post-thumbnail-content">
                                                            <a href="<?=post_url($row_slatest['seotitle']);?>" title="<?=$row_slatest['title'];?>"><?=$row_slatest['title'];?></a>
                                                            <span class="post-date"><i class="far fa-clock"></i> <?=ci_timeago($row_slatest['datepost'].$row_slatest['timepost']);?></span>
                                                            <span class="post-category"><i class="icon-folder-open"></i> <a href="<?=site_url('category/'.$pop_category['seotitle']);?>"><?=$pop_category['title'];?></a></span>
                                                            <span><i class="far fa-eye"></i> <?=$row_slatest['hits'];?></span>
                                                        </div>
                                                    </div>
                                                     <?php endforeach ?>
                                                </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!--End: Tabs with Posts-->

                            <!-- Category -->
    <div class="widget widget_links clearfix">
        <h4>Category</h4>
        <div class="col_half nobottommargin col_last">
            <ul>
                <?php
                    $sidebar_category = $this->CI->db
                        ->select('id_category,COUNT(*)')
                        ->from('t_post')
                        ->where('active','Y')
                        ->group_by('id_category')
                        ->order_by('COUNT(*)','DESC')
                        ->get()
                        ->result_array();
                    foreach ($sidebar_category as $rescount):
                        $row_scategory = $this->CI->db
                            ->select('id,title,seotitle')
                            ->where('id',$rescount['id_category'])
                            ->where('id >','1')
                            ->where('active','Y')
                            ->get('t_category')
                            ->row_array();

                        $num_spost = $this->CI->db
                            ->select('id')
                            ->where('id_category',$rescount['id_category'])
                            ->where('active','Y')
                            ->get('t_post')
                            ->num_rows();
                        
                        if ( is_null($row_scategory['id']) || $num_spost < 1 )
                            continue;
                ?>
                <li><a href="<?=site_url('category/'.$row_scategory['seotitle']);?>"><?=$row_scategory['title'];?> <span>(<?=$num_spost;?>)</span></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!--/ Category -->

                            <!--widget tags -->
                            <div class="widget  widget-tags">
                                <h4 class="widget-title">Tags</h4>
                                <div class="tags">
                                    <?php
                                            $side_tags = $this->CI->db
                                                ->select('
                                                          t_tag.title, 
                                                          t_tag.seotitle, 
                                                          COUNT(t_post.id) AS tag_count
                                                        ')
                                                ->from('t_tag')
                                                ->join('t_post', "t_post.tag LIKE CONCAT('%',t_tag.seotitle,'%')", 'LEFT')
                                                ->group_by('t_tag.id')
                                                ->get()
                                                ->result_array();
                                            foreach ( $side_tags as $row_stag ):
                                                if ( $row_stag['tag_count'] == 0 )
                                                    continue;
                                        ?>
                                        <a href="<?=site_url('tag/'.$row_stag['seotitle']);?>"><?=$row_stag['title'];?></a>
                                        <?php endforeach ?>
                                </div>
                            </div>
                            <!--end: widget tags -->


</div>
<!-- end: Sidebar-->
