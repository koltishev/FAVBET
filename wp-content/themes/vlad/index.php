<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vlad
 */

get_header();

?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
	?>
	<div class="main">
		<h1 class="main__header">Our open positions</h1>
        <form class="filter" id="filters-form">
		<select id="category-select" name="category_name">
			<option value="">All departments</option>
			<?php
			$departments = get_terms( array(
				'taxonomy' => 'department',
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => false,
			) );

			foreach ( $departments as $department ) {
				echo '<option data-slug=' . $department->slug . ' value="' . $department->slug . '">' . $department->name . '</option>';
			}
			?>
		</select>
		<label for="salary-select">Salary range:</label>
		<select id="salary-select">
			<option value="">All salaries</option>
			<option value="0-20000">$0-$20,000</option>
			<option value="20001-40000">$20,001-$40,000</option>
			<option value="40001-60000">$40,001-$60,000</option>
			<option value="60001-80000">$60,001-$80,000</option>
			<option value="80001-100000">$80,001-$100,000</option>
		</select>
        </form>

	<div class="vacancies-grid" id="filter-results">
		<?php
		$args = array(
			'post_type' => 'vacancies',
			'posts_per_page' => -1,
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) :
		while ($query->have_posts()) :
			$query->the_post();
		$post_title = get_the_title();
		$post_link = get_permalink();
			$department = get_the_terms(get_the_ID(), 'department');
		$post_date = get_the_date();
		$post_content = get_the_content();
		?>
			<div class="vacancy">
				<h2><?php echo $post_title;?></h2>
				<div class="department__list">
				<div class="department__item">
					<svg xmlns="http://www.w3.org/2000/svg" width="10" height="15" viewBox="0 0 10 15" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.26123 5.56C0.26123 2.9284 2.40752 0.800003 5.06123 0.800003C7.71494 0.800003 9.86123 2.9284 9.86123 5.56C9.86123 9.13 5.06123 14.4 5.06123 14.4C5.06123 14.4 0.26123 9.13 0.26123 5.56ZM6.7755 5.56C6.7755 6.49888 6.00798 7.26 5.06121 7.26C4.11444 7.26 3.34692 6.49888 3.34692 5.56C3.34692 4.62112 4.11444 3.86 5.06121 3.86C6.00798 3.86 6.7755 4.62112 6.7755 5.56Z" fill="#FF267E"/>
					</svg>
					<p>	<?php the_field('location');?></p>
				</div>
					<div class="department__item">
					<svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.87927 2.66666C7.87927 3.95333 6.83261 4.99999 5.54594 4.99999C4.25927 4.99999 3.21261 3.95333 3.21261 2.66666C3.21261 1.37999 4.25927 0.333328 5.54594 0.333328C6.83261 0.333328 7.87927 1.37999 7.87927 2.66666ZM0.879272 8.5C0.879272 6.94666 3.98594 6.16666 5.54594 6.16666C7.10594 6.16666 10.2126 6.94666 10.2126 8.5V9.66666H0.879272V8.5ZM10.2393 6.20666C11.0126 6.76666 11.5459 7.51333 11.5459 8.5V9.66666H14.2126V8.5C14.2126 7.15333 11.8793 6.38666 10.2393 6.20666ZM11.8793 2.66666C11.8793 3.95333 10.8326 4.99999 9.54594 4.99999C9.18594 4.99999 8.85261 4.91333 8.54594 4.76666C8.96594 4.17333 9.21261 3.44666 9.21261 2.66666C9.21261 1.88666 8.96594 1.15999 8.54594 0.566662C8.85261 0.419995 9.18594 0.333328 9.54594 0.333328C10.8326 0.333328 11.8793 1.37999 11.8793 2.66666Z" fill="#FF267E"/>
					</svg>
						<p><?php echo $department[0]->name;?></p>
	                </div>
			   <div class="department__item">
				   <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
					   <path d="M10.6004 0.528737L8.36607 0.0131227C8.1233 -0.0427355 7.87409 0.0840196 7.77526 0.311749L6.74403 2.71795C6.6538 2.92849 6.71395 3.17556 6.89227 3.3195L8.1942 4.3851C7.42078 6.03292 6.06944 7.40359 4.38724 8.19205L3.32164 6.89013C3.17555 6.71181 2.93063 6.65165 2.72009 6.74189L0.313889 7.77312C0.0840111 7.87409 -0.0427441 8.1233 0.0131141 8.36607L0.528729 10.6004C0.582438 10.8324 0.788684 11 1.03145 11C6.53349 11 11 6.54209 11 1.03146C11 0.790841 10.8346 0.582447 10.6004 0.528737Z" fill="#FF267E"/>
				   </svg>
				   <p><?php the_field('phone');?></p>
			   </div>



				</div>
				<div class="">
					<span>Salary:</span>
					<b><?php the_field('salary');?></b>
				</div>

				<a class="more__" href='<?php echo $post_link;?>'>LEARN MORE <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 10 14" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M1.28448 2.3399C1.06862 2.33938 0.859427 2.4314 0.693218 2.59999C0.504286 2.79172 0.385442 3.06758 0.362911 3.36672C0.340379 3.66586 0.416011 3.96367 0.573118 4.19445L3.21531 6.98448L0.554652 9.79999C0.399659 10.0336 0.327139 10.3332 0.353148 10.6325C0.379157 10.9317 0.50155 11.206 0.693228 11.3945C0.886464 11.6026 1.14187 11.7026 1.39791 11.6704C1.65395 11.6382 1.88741 11.4767 2.04203 11.2248L5.17385 7.6969C5.45407 7.27962 5.45407 6.67803 5.17385 6.26075L2.05126 2.74699C1.86329 2.46944 1.57847 2.31822 1.28448 2.3399Z" fill="#FF267E"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M4.35181 0.202037C4.13596 0.201521 3.92676 0.293543 3.76055 0.462128C3.57162 0.653857 3.45278 0.929725 3.43025 1.22886C3.40772 1.52799 3.48335 1.82581 3.64046 2.05659L7.77926 6.98448L3.78827 11.9237C3.63328 12.1573 3.56076 12.4569 3.58677 12.7562C3.61278 13.0554 3.73517 13.3297 3.92685 13.5181C4.12008 13.7263 4.37549 13.8263 4.63153 13.7941C4.88757 13.7619 5.12102 13.6004 5.27565 13.3485L9.7378 7.6969C10.018 7.27962 10.018 6.67803 9.7378 6.26075L5.1186 0.609134C4.93063 0.331576 4.64581 0.180362 4.35181 0.202037Z" fill="#FF267E"/>
					</svg></a>
				</div>
			<?php
		endwhile;
		endif;
		?>
	</div>


	<script>
        jQuery(document).ready(function() {
            let select = $('.filter select');
            let results = $('#results');
            select.on('change', function(event) {
                event.preventDefault();
                var category_name = $('#category-select').val();
                var salary_range = $('#salary-select').val();

                console.log(category_name, salary_range);

                $.ajax({
                    url: myajax.url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        action: 'get_filtered_posts',
                        category_name: category_name,
                        salary_range: salary_range
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        console.log(response);
                        var posts = response;
                        var output = '';
                        for(var i = 0; i < posts.length; i++) {
                            output +='<div class="vacancy"> <h2>' + posts[i].title + '</h2>';
                            output +=`
                                <div class="department__list">
                                    <div class="department__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="15" viewBox="0 0 10 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.26123 5.56C0.26123 2.9284 2.40752 0.800003 5.06123 0.800003C7.71494 0.800003 9.86123 2.9284 9.86123 5.56C9.86123 9.13 5.06123 14.4 5.06123 14.4C5.06123 14.4 0.26123 9.13 0.26123 5.56ZM6.7755 5.56C6.7755 6.49888 6.00798 7.26 5.06121 7.26C4.11444 7.26 3.34692 6.49888 3.34692 5.56C3.34692 4.62112 4.11444 3.86 5.06121 3.86C6.00798 3.86 6.7755 4.62112 6.7755 5.56Z" fill="#FF267E"/>
                                        </svg>
                                        <p>${posts[i].location}</p>
                                    </div>
                                    <div class="department__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.87927 2.66666C7.87927 3.95333 6.83261 4.99999 5.54594 4.99999C4.25927 4.99999 3.21261 3.95333 3.21261 2.66666C3.21261 1.37999 4.25927 0.333328 5.54594 0.333328C6.83261 0.333328 7.87927 1.37999 7.87927 2.66666ZM0.879272 8.5C0.879272 6.94666 3.98594 6.16666 5.54594 6.16666C7.10594 6.16666 10.2126 6.94666 10.2126 8.5V9.66666H0.879272V8.5ZM10.2393 6.20666C11.0126 6.76666 11.5459 7.51333 11.5459 8.5V9.66666H14.2126V8.5C14.2126 7.15333 11.8793 6.38666 10.2393 6.20666ZM11.8793 2.66666C11.8793 3.95333 10.8326 4.99999 9.54594 4.99999C9.18594 4.99999 8.85261 4.91333 8.54594 4.76666C8.96594 4.17333 9.21261 3.44666 9.21261 2.66666C9.21261 1.88666 8.96594 1.15999 8.54594 0.566662C8.85261 0.419995 9.18594 0.333328 9.54594 0.333328C10.8326 0.333328 11.8793 1.37999 11.8793 2.66666Z" fill="#FF267E"/>
                                        </svg>
                                          <p>${posts[i].department[0].name}</p>

                                    </div>
                                    <div class="department__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M10.6004 0.528737L8.36607 0.0131227C8.1233 -0.0427355 7.87409 0.0840196 7.77526 0.311749L6.74403 2.71795C6.6538 2.92849 6.71395 3.17556 6.89227 3.3195L8.1942 4.3851C7.42078 6.03292 6.06944 7.40359 4.38724 8.19205L3.32164 6.89013C3.17555 6.71181 2.93063 6.65165 2.72009 6.74189L0.313889 7.77312C0.0840111 7.87409 -0.0427441 8.1233 0.0131141 8.36607L0.528729 10.6004C0.582438 10.8324 0.788684 11 1.03145 11C6.53349 11 11 6.54209 11 1.03146C11 0.790841 10.8346 0.582447 10.6004 0.528737Z" fill="#FF267E"/>
                                        </svg>
                                     <p>${posts[i].phone}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <span>Salary:</span>
                                    <b>${posts[i].salary}</b>
                                </div>

                                <a class="more__" href='${posts[i].link}'>LEARN MORE <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 10 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.28448 2.3399C1.06862 2.33938 0.859427 2.4314 0.693218 2.59999C0.504286 2.79172 0.385442 3.06758 0.362911 3.36672C0.340379 3.66586 0.416011 3.96367 0.573118 4.19445L3.21531 6.98448L0.554652 9.79999C0.399659 10.0336 0.327139 10.3332 0.353148 10.6325C0.379157 10.9317 0.50155 11.206 0.693228 11.3945C0.886464 11.6026 1.14187 11.7026 1.39791 11.6704C1.65395 11.6382 1.88741 11.4767 2.04203 11.2248L5.17385 7.6969C5.45407 7.27962 5.45407 6.67803 5.17385 6.26075L2.05126 2.74699C1.86329 2.46944 1.57847 2.31822 1.28448 2.3399Z" fill="#FF267E"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.35181 0.202037C4.13596 0.201521 3.92676 0.293543 3.76055 0.462128C3.57162 0.653857 3.45278 0.929725 3.43025 1.22886C3.40772 1.52799 3.48335 1.82581 3.64046 2.05659L7.77926 6.98448L3.78827 11.9237C3.63328 12.1573 3.56076 12.4569 3.58677 12.7562C3.61278 13.0554 3.73517 13.3297 3.92685 13.5181C4.12008 13.7263 4.37549 13.8263 4.63153 13.7941C4.88757 13.7619 5.12102 13.6004 5.27565 13.3485L9.7378 7.6969C10.018 7.27962 10.018 6.67803 9.7378 6.26075L5.1186 0.609134C4.93063 0.331576 4.64581 0.180362 4.35181 0.202037Z" fill="#FF267E"/>
                                </svg></a>
                            </div>`;
                        }
                        $('#filter-results').html(output);
                    },

                    complete: function()
                    {

                    },
                    error: function() {
                    }
                });
            });
        });

	</script>
	<style>
        .main {
            max-width: 1280px;
            margin: 50px auto;
            background: #F4F4F4;
        }
        .main__header {
            background: #000055;
            padding: 30px 0 30px 30px;
	        text-transform: uppercase;
	        color: #FFF;
        }

        .vacancies-grid {
	        display: grid;
	        grid-template-columns: 1fr 1fr;
	        gap: 20px;
        }

        .vacancy {
	        max-width: 560px;
	        width: 100%;
            background: #FFFFFF;
            border-radius: 4px;
           transition: all 0.5s;
	        border: 1px solid transparent;
	        padding: 24px;
	        margin: 0 auto;
        }

        .vacancy h2 {
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 30px;
            /* identical to box height, or 167% */

            letter-spacing: 0.04em;
            text-transform: uppercase;

            /* Blue */

            color: #000055;
        }

        .vacancy:hover {
            border: 1px solid #05C48A;
            box-shadow: 0px 1px 16px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .department__list {
	        display: flex;
            margin-bottom: 21px;
        }

        .department__item {
	        display: flex;
            margin-right: 21px;
	        align-items: center;
        }

        .department__item > p {
	        margin: 0 0 0 12px;
        }

        .more__ {
            font-style: normal;
            font-weight: 700;
            font-size: 14px;
            line-height: 28px;
	        text-decoration: none;
            text-transform: uppercase;
	        display: flex;
	        align-items: center;
            color: #000055;
        }

        .more__ svg {
            margin-left: 11px;
        }
        .vacancy__title {
            font-weight: 700;
            font-size: 18px;
            line-height: 30px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #000055;

        }

        .filter {
            margin-left: 34px;
            margin-bottom: 30px;
        }

        .filter select {
            padding: 7px 40px 7px 7px;
            background: #FFF;
            border: none;
        }
	</style>
<?php
get_footer();

