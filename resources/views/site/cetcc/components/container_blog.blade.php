<div class="container margin_60_35">
        <div class="row">
            <main class="col-lg-9">
                <div class="row">
                {{-- CONTEUDO --}}
                    @component('site.cetcc.components.card')
                        @slot('img_card')
                        http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg
                        @endslot
                        @slot('category')
                        Category
                        @endslot
                        @slot('title')
                        Title - Persius delenit has cu
                        @endslot
                        @slot('paragraph')
                        Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.
                        @endslot
                        @slot('img_author')
                        http://via.placeholder.com/80x80/ccc/fff/thumb_blog.jpg
                        @endslot
                        @slot('comment')
                        20
                        @endslot
                        
                        @slot('author')
                        Jessica Hoops
                        @endslot

                        @slot('insert_date')
                        12/09/2019
                        @endslot
                        @slot('like')
                        blog/1
                        @endslot
                        @slot('views')
                        380
                        @endslot
                        @slot('link')
                        blog/1
                        @endslot
                    @endcomponent
                    @component('site.cetcc.components.card_wide')
                        @slot('img_card')
                        http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg
                        @endslot
                        @slot('category')
                        Category
                        @endslot
                        @slot('title')
                        Title - Nec nihil menandri appellantur ut
                        @endslot
                        @slot('paragraph')
                        Quodsi sanctus pro eu, ne audire scripserit quo. Vel an enim offendit salutandi, in eos quod omnes epicurei, ex veri qualisque scriptorem mei.
                        @endslot
                        @slot('img_author')
                        http://via.placeholder.com/80x80/ccc/fff/thumb_blog.jpg
                        @endslot
                        @slot('comment')
                        20
                        @endslot
                        
                        @slot('author')
                        Jessica Hoops
                        @endslot

                        @slot('insert_date')
                        12/09/2019
                        @endslot
                        @slot('like')
                        blog/1
                        @endslot
                        @slot('views')
                        380
                        @endslot
                        @slot('link')
                        blog/1
                        @endslot
                    @endcomponent
                </div>
                {{-- PAGINATION --}}
                @component('site.cetcc.components.pagination')
                @endcomponent            
            </main>

            {{-- MENU LATERAL --}}
            @component('site.cetcc.components.sidebar')
            <!-- /aside -->
            @endcomponent            
        </div>
        <!-- /row -->
    </div>