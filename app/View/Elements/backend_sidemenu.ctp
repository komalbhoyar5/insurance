<?php
    $user = $_SESSION['Auth'];
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">Insurance</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo ucwords($user['User']['f_name']." " . $user['User']['l_name']); ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo $this->webroot; ?>users/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <?php
                $count = 1;
                    foreach ($perm as $tree) { ?>
                    <li <?php if($count == 1){ ?>class="active" <?php } ?>>
                        <?php if ($tree['Permission']['page_action'] == "#" || $tree['Permission']['page_action'] ==""){ ?>
                            <a <?php if($count == 1){ ?>class="active" <?php } ?>><i class="<?php echo $tree['Permission']['icon']; ?>"></i> <?php echo $tree['Permission']['page_name']; ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <?php
                                    if (isset($tree['childs'])) {
                                        foreach ($tree['childs'] as $childs) { ?>
                                            <li><a href="<?php echo $this->webroot. $childs['Permission']['page_action']; ?>"><?php echo $childs['Permission']['page_name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                ?>
                            </ul>
                        <?php }else{ ?>
                            <a href="<?php echo $this->webroot. $tree['Permission']['page_action']; ?>" <?php if($count == 1){ ?>class="active" <?php } ?>><i class="<?php echo $tree['Permission']['icon']; ?>"></i> <?php echo $tree['Permission']['page_name']; ?></a>
                        <?php
                        } ?>
                    </li>
                <?php
                $count++;
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>