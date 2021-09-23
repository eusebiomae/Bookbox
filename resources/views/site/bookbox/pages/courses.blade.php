@extends('site.cetcc.layout.layout')
@section('title', 'Cursos')

@section('css')
<link href="{!! asset('cetcc/css/skins/square/grey.css') !!}" rel="stylesheet">

@parent
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endsection

@section('content')
@include('site.cetcc.components.banner')
@include('site.cetcc.vueComponents.card_g2')
@include('site.cetcc.vueComponents.card_wide')
@include('site.cetcc.vueComponents.filter_sidebar')
@include('site.cetcc.vueComponents.filter_menu')

<div id="app">
	<div class="filters_listing gp-bkg-yellow sticky_horizontal">
		<filter-menu ref="filterMenu" :payload="payloadFilterMenu" />
	</div>

	<div class="container margin_60">
		<div class="row">
			<aside class="col-lg-3" id="sidebar">
				<span v-for="(payload, key) in payloadFilterSidebar" v-show="payload.show">
					<filter-sidebar :ref="'filterSidebar' + key" :payload="payload" :filter-sidebar-key="key" />
				</span>
			</aside>
			<div class="col-lg-9">
				<div class="card-flex">
					<card-g
						class=" p-0"
						v-if="payloadFilterMenu.layoutView === 'card'"
						v-for="course in showCourses"
						:key="course.id"
						:payload="nomalizeCardG(course)"
					/>
				</div>

				<div>
					<card-wide
						v-if="payloadFilterMenu.layoutView === 'list'"
						v-for="course in showCourses"
						:key="course.id"
						:payload="nomalizeCardG(course)"
					/>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection

@section('scripts')
@parent

<script>
	var app = new Vue({
		el: '#app',
		data: function() {
			return {
				columnN: 3,
				params: {!! json_encode($params) !!},
				flgType: '{{ $flgCourseCategoryType }}' || 'all',
				courseCategoryTypes: {!! $courseCategoryTypes !!},
				courseCategories: {!! $courseCategories !!},
				courseSubcategories: {!! $courseSubcategories !!},
				courses: {!! $courses !!},
				countGroupCourse: [],
				showCourses: [],
				filtersCourse: {
					categoryTypes: 'all',
					categories: [],
					subcategories: [],
					layoutView: 'card',
					// layoutView: 'list',
					showSubcategories: true,
				},
				payloadFilterMenu: {
					menuField: [],
					selectbox: [],
					layoutView: 'card',
					// layoutView: 'list',
				},
				payloadFilterSidebar: {
					category: {
						show: true,
						title: 'Área',
						items: [],
					},
					subcategory: {
						show: true,
						title: 'Formato',
						items: [],
					},
				},
			}
		},
		methods: {
			filterCourses: function() {
				var result = this.courses.reduce(function(carry, course) {
					if (course.__$filter.show.categoryType && course.__$filter.show.category && course.__$filter.show.subcategory) {
						carry.push(course)
					}
					return carry
				}, [])

				var countGroupCourse = result.length / this.columnN

				this.countGroupCourse = []

				for (var i = 0; i < countGroupCourse; i++) {
					this.countGroupCourse.push(i * this.columnN)
				}

				this.showCourses = result
			},
			init: function() {
				this.getHash()

				this.payloadFilterSidebar.subcategory.show = this.filtersCourse.showSubcategories

				this.payloadFilterMenu.layoutView = this.filtersCourse.layoutView

				this.generatePayloadFilterMenu()
				this.generatePayloadFilterSidebar()
				this.normalizeCourses()

				if (this.filtersCourse.categoryTypes == 'all') {
					for (var i = this.courseCategoryTypes.length - 1; i > -1; i--) {
						if (this.courseCategoryTypes[i].flg == this.flgType) {
							this.filtersCourse.categoryTypes = this.courseCategoryTypes[i].id
							break
						}
					}
				}
			},
			setHash: function() {
				location.hash = encodeURI(JSON.stringify(this.filtersCourse))
			},
			getHash: function() {
				try {
					return Object.assign(this.filtersCourse, JSON.parse(decodeURI(location.hash.substr(1))))
				} catch (error) {

				}
			},
			nomalizeCardG: function(data) {
				var playload = {
					image: data.img,
					title: data.title_pt,
					description: data.description_pt,
					subcategory: data.course_subcategory.description_pt.toUpperCase(),
					category: data.course_category.description_pt,
					type: data.course_category_type.title,
					cta: data.cta,
					color: data.course_category.color ? data.course_category.color : '#a9a9a9',
					showTitle: data.show_title,
					certified: data.certified,
					hoursLoad: data.hours_load,
					schoolClinic: data.school_clinic,
					additionalInformation: data.additional_information,
					link: '/course/' + data.id,
				}

				try {
					playload.subtitle = (data.course_subcategory ? data.course_subcategory.description_pt : '') + ' - ' + (data.course_category ? data.course_category.description_pt : '')
				} catch (error) {
					console.warn(error, data)
				}

				return playload
			},
			normalizeCourses: function(courses) {
				this.courses.forEach(function(course) {
					Vue.set(course, '__$filter', {
						show: {
							categoryType: false,
							category: true,
							subcategory: true,
						}
					})
				})
			},
			generatePayloadFilterSidebar: function() {
				this.payloadFilterSidebar.category.items = [
					{
						key: 'all',
						label: 'Todos',
						value: 'all',
						checked: true,
					}
				]

				this.payloadFilterSidebar.subcategory.items = [
					{
						key: 'all',
						label: 'Todos',
						value: 'all',
						checked: true,
					}
				]

				for (var key in this.courseCategories) {
					var courseCategory = this.courseCategories[key]
					this.payloadFilterSidebar.category.items.push({
						key: 'sidebarCourseCategory' + courseCategory.id,
						label: courseCategory.description_pt,
						value: courseCategory.id,
					})
				}

				for (var key in this.courseSubcategories) {
					var courseSubcategory = this.courseSubcategories[key]
					this.payloadFilterSidebar.subcategory.items.push({
						key: 'sidebarCourseSubcategory' + courseSubcategory.id,
						label: courseSubcategory.description_pt,
						value: courseSubcategory.id,
					})
				}
			},
			generatePayloadFilterMenu: function() {
				this.payloadFilterMenu.menuField = [
					{
						key: 'all',
						label: 'Todos',
						checked: this.flgType == 'all',
					}
				]

				for (var i = 0; i < this.courseCategoryTypes.length; i++) {
					var courseCategoryType = this.courseCategoryTypes[i]

					var checked = this.flgType === courseCategoryType.flg

					this.payloadFilterMenu.menuField.push({
						id: courseCategoryType.id,
						key: courseCategoryType.flg,
						label: courseCategoryType.title,
						checked,
					})
				}

				this.payloadFilterMenu.selectbox = [
					{
						label: 'Área',
						value: 'all',
					}
				]

				for (var key in this.courseCategories) {
					var courseCategory = this.courseCategories[key]
					this.payloadFilterMenu.selectbox.push({
						label: courseCategory.description_pt,
						value: courseCategory.id,
					})
				}
			},
			runFilter: function() {
				for (var i = this.courses.length - 1; i > -1; i--) {
					var course = this.courses[i]
					var categoryType = this.filtersCourse.categoryTypes
					var categories = this.filtersCourse.categories
					var subcategories = this.filtersCourse.subcategories

					course.__$filter.show.categoryType = (categoryType == 'all') || (course.course_category_type_id == categoryType)
					course.__$filter.show.category = (categories.length == 0) || categories.includes(parseInt(course.course_category_id))
					course.__$filter.show.subcategory = (subcategories.length == 0) || subcategories.includes(parseInt(course.course_subcategory_id))

					this.updateCheckboxFilterSidebar('collapseFilterscategory', categories)
					this.updateCheckboxFilterSidebar('collapseFilterssubcategory', subcategories)
				}

				this.filterCourses()
			},
			// showHide = 1: show | -1: hide
			filterCourseDefault: function(arr, id, showHide) {
				if (id == 'all') {
					return
				}

				id = parseInt(id)

				var index = arr.indexOf(id)

				if (index > -1 && showHide != 1) {
					arr.splice(index, 1)
				} else
				if (showHide != -1) {
					arr.push(id)
				}

				return arr
			},
			filterCategoryType: function(id) {
				this.filtersCourse.categoryTypes = id || 'all'
				this.runFilter()
				this.setHash()
			},
			filterCategory: function(id, showHide) {
				var categories = this.filtersCourse.categories
				this.filterCourseDefault(categories, id, showHide);

				if (id == 'all') {
					this.filtersCourse.categories = []
					categories = []
				} else
				if (categories.length === 0) {
					id = 'all'
				}

				this.runFilter()
				this.setHash()
			},
			filterSubCategory: function(id, showHide) {
				var subcategories = this.filtersCourse.subcategories
				this.filterCourseDefault(this.filtersCourse.subcategories, id, showHide);

				if (id == 'all') {
					this.filtersCourse.subcategories = []
					subcategories = []
				} else
				if (subcategories.length === 0) {
					id = 'all'
				}

				this.runFilter()
				this.setHash()
			},
			updateCheckboxFilterSidebar: function(key, list) {
				document.getElementById(key).querySelectorAll('[type="checkbox"]').forEach(function(elem) {
					elem.checked = (list.length == 0 && elem.value == 'all') || list.includes(parseInt(elem.value))
				})
			},
			onFilterMenuField: function(value) {
				this.filterCategoryType(value.id)
			},
			onFilterMenuLayoutView: function(value) {
				this.payloadFilterMenu.layoutView = value
				this.filtersCourse.layoutView = value
				this.setHash()
			},
			onFilterMenuSelectbox: function(event) {
				this.filtersCourse.categories = []
				this.filterCategory(event.target.value)
			},
			onFilterSidebar: function(data) {
				try {
					({
						category: this.filterCategory,
						subcategory: this.filterSubCategory,
					})[data.key](data.item.value)
				} catch (error) {
					console.warn(error)
				}
			},
		},
		beforeMount: function() {
			this.init()
		},
		mounted: function() {
			this.runFilter()
			this.setHash()

			this.$refs.filterMenu.$on('onFilterMenuField', this.onFilterMenuField)
			this.$refs.filterMenu.$on('onFilterMenuLayoutView', this.onFilterMenuLayoutView)
			this.$refs.filterMenu.$on('onFilterMenuSelectbox', this.onFilterMenuSelectbox)

			for (var key in this.payloadFilterSidebar) {
				if (this.$refs['filterSidebar' + key].length) {
					this.$refs['filterSidebar' + key] = this.$refs['filterSidebar' + key][0]
				}

				this.$refs['filterSidebar' + key].$on('onFilterSidebar', this.onFilterSidebar)
			}
		},
		beforeDestroy: function() {
		}
	})

</script>

@endsection
