

        <article class="hentry {{class}}" itemscope itemtype="http://schema.org/Article">
            <header class="entry-header">
                <h1 class="entry-title">
                    <a rel="bookmark" itemprop="url" href="{{url}}">
                        <span itemprop="name">{{title}}</span>
                    </a>
                </h1>
            </header>

            <div class="entry-content" itemprop="articleBody">
                {{item.html}}
            </div>

            <footer class="entry-footer" role="contentinfo">
                <dl class='pairs meta-list entry-meta'>
                    <dt class='meta-label time-label'>Created</dt>
                    <dd class='meta-value time-value'><time itemprop='dateCreated datePublished' class='published'>{{pubdate}}</time></dd>
                    <dt class='meta-label time-label'>Updated</dt>
                    <dd class='meta-value time-value'><time itemprop='dateModified' class='updated'>{{moddate}}</time></dd>
                    <dt class='meta-label edit-label'>Contribute</dt>
                    <dd class='meta-value edit-value'><a href="{{url.tree}}">Edit this article.</a></dd>
                </dl>
            </footer>
        </article>
