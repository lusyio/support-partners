<?php
/*
Template Name: main-landing
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>


    <div id="carouselExampleControls" class="carousel main-slider mt-5 slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="main-screen main-screen_video">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="main-screen__inner">
                                    <div class="main-screen__date">27.06.2020</div>
                                    <h1 class="main-screen__title">название мероприятия</h1>
                                    <div class="main-screen__descr">Масштабная конференция о создании <br> сильных
                                        команд
                                    </div>
                                    <div>
                                        <button class="main-screen__btn btn-primary">Узнать больше</button>
                                        <a class="main-screen__link" href="#">
                                            <img src="/wp-content/themes/storefront-child/svg/play.svg" alt="">
                                            Смотреть видео
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-screen__video">
                                    <video poster="/wp-content/themes/storefront-child/img/main-screen/video-plug.png"
                                           preload="none" controls>
                                        <source src="https://youtu.be/sZBM492Ufco"
                                                type='video/webm; codecs="vp8, vorbis"'/>
                                        <source src="https://youtu.be/sZBM492Ufco"
                                                type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
                                        <source src="https://youtu.be/sZBM492Ufco"
                                                type='video/ogg; codecs="theora, vorbis"'/>
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="main-screen main-screen_photo">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-screen__inner">
                                    <h1 class="main-screen__title">создаем <br> <span>сильные</span> команды</h1>
                                    <div class="main-screen__descr">Масштабная конференция о создании <br> сильных
                                        команд
                                    </div>
                                    <div>
                                        <button class="main-screen__btn btn-primary">Посмотреть услуги</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-screen__img">
                                    <img src="/wp-content/themes/storefront-child/img/main-screen/img-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-slider__control">
                <a href="">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="1.32353" cy="1.32353" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="1.32353" cy="7.5" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="1.32353" cy="13.6765" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="7.49931" cy="1.32353" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="7.49931" cy="7.5" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="7.49931" cy="13.6765" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="13.677" cy="1.32353" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="13.677" cy="7.5" r="1.32353" fill="black" fill-opacity="0.5"/>
                        <circle cx="13.677" cy="13.6765" r="1.32353" fill="black" fill-opacity="0.5"/>
                    </svg>
                    Контакты
                </a>
                <div>
                    <div class="main-slider__count">
                        <span>3</span>/6
                    </div>
                    <div class="main-slider__btns">
                        <a class="carousel-control-prev carousel-control" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                        <a class="carousel-control-next carousel-control" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="about__inner">
                        <h2 class="about__heading"><?php the_field('about_heading'); ?></h2>
                        <div class="about__subheading"><?php the_field('about_subheading'); ?></div>
                        <div class="about__descr">
                            <?php the_field('about_descr'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about__img">
                        <?= get_field('about_photo')
                            ?: '<img src="/wp-content/themes/storefront-child/img/about.png" alt="">' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cycle">
        <div class="container">
            <h2 class="heading">Цикл создания сильных команды</h2>
            <?php
            try {
                $labels = json_encode(array_filter(explode(";", get_field('cicle_title'))), JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
            }
            ?>
            <div class="chart">
                <div class="chart-wrapper">
                    <canvas data-labels='<?= $labels ?>'
                            id="myChart" width="100%"
                            height="100%">
                    </canvas>
                    <div id="tooltip">
                        <div><p><span id="tooltip-target">1</span>/5</p></div>
                    </div>
                </div>
            </div>

            <script>
                const chartNode = document.getElementById('myChart')
                const ctx = chartNode.getContext('2d');
                const labels = JSON.parse(chartNode.dataset.labels)
                const values = new Array(labels.length).fill(1)
                const data = {
                    datasets: [{
                        data: values,
                        backgroundColor: '#E3EEF7',
                        hoverBackgroundColor: '#005896',
                        borderWidth: 1,
                        borderAlign: 'inner',
                    }],
                    labels: labels
                };

                let chart_config = {
                    type: 'doughnut',
                    data: data,
                    options: {
                        plugins: {
                            labels: {
                                render: function (args) {
                                    return args.index + 1;
                                },
                                fontSize: 36,
                                fontStyle: 'bold',
                                fontColor: '#fff',
                                fontFamily: 'Roboto'
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            animateScale: true
                        },
                        cutoutPercentage: 60,
                        onHover: debounce(handleHover, 50),
                        legend: false,
                        tooltips: {
                            enabled: false,
                            custom: customTooltip
                        }
                    }
                }

                const chart = new Chart(ctx, chart_config);

                function customTooltip(tooltipModel) {
                    // Tooltip Element
                    let tooltipEl = document.getElementById('chartjs-tooltip');

                    // Create element on first render
                    if (!tooltipEl) {
                        tooltipEl = document.createElement('div');
                        tooltipEl.id = 'chartjs-tooltip';
                        tooltipEl.innerHTML = '<table></table>';
                        document.body.appendChild(tooltipEl);
                    }

                    // Hide if no tooltip
                    if (tooltipModel.opacity === 0) {
                        tooltipEl.style.opacity = 0
                        return;
                    }

                    // Set caret Position
                    tooltipEl.classList.remove('above', 'below', 'no-transform');
                    if (tooltipModel.yAlign) {
                        tooltipEl.classList.add(tooltipModel.yAlign);
                    } else {
                        tooltipEl.classList.add('no-transform')
                    }

                    function getBody(bodyItem) {
                        return bodyItem.lines;
                    }

                    // Set Text
                    if (tooltipModel.body) {
                        let titleLines = tooltipModel.title || []
                        let bodyLines = tooltipModel.body.map(getBody)

                        let innerHtml = '<thead>'

                        titleLines.forEach(function (title) {
                            innerHtml += '<tr><th>' + title + '</th></tr>'
                        });
                        innerHtml += '</thead><tbody>'

                        bodyLines.forEach(function (body, i) {
                            let normalizedBody = body[0].replace(/[^A-Za-zА-Яа-я\s]/g, '')
                            let style = 'background: #F4F8FB'
                            style += '; border-color: #F4F8FB'
                            style += '; border-width: 2px'
                            const span = `<span style="${style}"></span>`
                            innerHtml += `<tr><td>${span} ${normalizedBody}</td></tr>`
                        });
                        innerHtml += '</tbody>';

                        let tableRoot = tooltipEl.querySelector('table');
                        tableRoot.innerHTML = innerHtml;
                    }

                    // `this` will be the overall tooltip
                    let position = this._chart.canvas.getBoundingClientRect();

                    // Display, position, and set styles for font
                    tooltipEl.style.opacity = 1
                    tooltipEl.style.position = 'absolute'
                    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px'
                    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px'
                    tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily
                    tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px'
                    tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle
                    tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px'
                    tooltipEl.style.pointerEvents = 'none'
                    tooltipEl.style.color = '#005896'
                    tooltipEl.style.textTransform = 'uppercase'
                    tooltipEl.style.zIndex = 2
                }

                /**
                 * Handle hover event on chart bar
                 * @todo show active bar
                 * @param e
                 */
                function handleHover(e) {
                    let activeElement = chart.getElementAtEvent(e);

                    if (activeElement[0]) {
                        const index = activeElement[0]._index
                        // console.log(activeElement[0]._index)

                        changeCenterNumber(index + 1)
                        showTeamBlock(index)
                    }
                }

                /**
                 * Change number in center of chart
                 * @param number
                 */
                function changeCenterNumber(number) {
                    const $target = document.getElementById('tooltip-target')
                    $target.textContent = number
                }

                /**
                 * Hide all team block and show selected by id
                 * @param id
                 */
                function showTeamBlock(id) {
                    const items = document.querySelectorAll('.team')
                    const $target = document.getElementById(`team-${id}`)
                    items.forEach((item, _) => {
                        item.classList.add('d-none')
                    })
                    $target.classList.remove('d-none')
                }

                /**
                 * Debounce functions
                 * @param fn
                 * @param wait
                 * @return {function(...[*]=)}
                 */
                function debounce(fn, wait) {
                    let timeout
                    return function (...args) {
                        const later = () => {
                            clearTimeout(timeout)
                            fn.apply(this, args)
                        }
                        clearTimeout(timeout)
                        timeout = setTimeout(later, wait)
                    }
                }
            </script>
        </div>
    </section>

    <section id="team-0" class="team">
        <div class="container">
            <h2 class="team__title">Создать команду</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team__item">
                        <div class="team__item-title">executive search</div>
                        <div class="team__item-descr">Подбор управленческого персонала</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/research.svg"
                             alt="">
                        <a class="team__item-link" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team__item team__item_small team__item_white">
                        <div class="team__item-box">
                            <div class="team__item-title team__item-title_small">salary overview</div>
                            <div class="team__item-descr team__item-descr_small">Обзор заработных плат</div>
                            <a class="team__item-link team__item-link_blue" href="#">
                                Подробнее
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="team__item-box">
                            <div class="team__item-title team__item-title_small">ready</div>
                            <div class="team__item-descr team__item-descr_small">Проект</div>
                            <a class="team__item-link team__item-link_blue" href="#">
                                Подробнее
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team-1" class="team d-none">
        <div class="container">
            <h2 class="team__title">Оценить команду</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team__item team__item_white">
                        <div class="team__item-title team__item-title_dark">disc</div>
                        <div class="team__item-descr team__item-descr_dark">Тестирование</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/notepad.svg"
                             alt="">
                        <a class="team__item-link team__item-link_blue" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team-2" class="team d-none">
        <div class="container">
            <h2 class="team__title">Управлять командой</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team__item team__item_white">
                        <div class="team__item-title team__item-title_dark">удалённая команда</div>
                        <div class="team__item-descr team__item-descr_dark">Курс</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/interview.svg"
                             alt="">
                        <a class="team__item-link team__item-link_blue" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team__item">
                        <div class="team__item-title">командос</div>
                        <div class="team__item-descr">Тренинг</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/sport-team.svg"
                             alt="">
                        <a class="team__item-link" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team-3" class="team d-none">
        <div class="container">
            <h2 class="team__title">Развивать себя и строить карьеру <span>/</span> Найти для себя сильную команду</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team__item team__item_small team__item_white">
                        <div class="team__item-box">
                            <div class="team__item-title team__item-title_small">карьерное консультирование</div>
                            <a class="team__item-link team__item-link_blue" href="#">
                                Подробнее
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="team__item-box">
                            <div class="team__item-title team__item-title_small">персональное консультирование</div>
                            <a class="team__item-link team__item-link_blue" href="#">
                                Подробнее
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team__item">
                        <div class="team__item-title">командос</div>
                        <div class="team__item-descr">Онлайн-курс</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/sport-team.svg"
                             alt="">
                        <a class="team__item-link" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team__item team__item_small team__item_white">
                        <div class="team__item-box">
                            <div class="team__item-title team__item-title_small">вакансии</div>
                            <div class="team__item-descr team__item-descr_small">Найти менеджера или <br> подать резюме
                            </div>
                            <a class="team__item-link team__item-link_blue" href="#">Подробнее</a>
                        </div>
                        <div class="team__item-box">
                            <div class="team__item-title team__item-title_small">частная практика</div>
                            <div class="team__item-descr team__item-descr_small">Проект</div>
                            <a class="team__item-link team__item-link_blue" href="#">
                                Подробнее
                                <svg class="icon">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team-4" class="team d-none">
        <div class="container">
            <h2 class="team__title">Трансформировать бизнес</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team__item team__item_white">
                        <div class="team__item-title team__item-title_dark">экспертные <br> сессии</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/support.svg"
                             alt="">
                        <a class="team__item-link team__item-link_blue" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team__item">
                        <div class="team__item-title">стратегические сессии</div>
                        <img class="team__item-img" src="/wp-content/themes/storefront-child/svg/team/idea.svg" alt="">
                        <a class="team__item-link" href="#">
                            Подробнее
                            <svg class="icon">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project">
        <div class="container">
            <h2 class="heading">Кейсы и проекты</h2>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="project__item">
                        <img src="/wp-content/themes/storefront-child/img/project/img-1.png" alt="">
                        <div class="project__title">добывающий <br> холдинг</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="project__item">
                        <img src="/wp-content/themes/storefront-child/img/project/img-2.png" alt="">
                        <div class="project__title">сельско-хозяйственный <br> холдинг</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="project__item">
                        <img src="/wp-content/themes/storefront-child/img/project/img-3.png" alt="">
                        <div class="project__title">промышленно- <br> производственный <br> холдинг</div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="clients">
        <div class="container">
            <h2 class="heading">Наши клиенты</h2>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="/wp-content/themes/storefront-child/svg/clients/luhta.svg" alt="">
                </div>
                <div class="col-md-2">
                    <img src="/wp-content/themes/storefront-child/svg/clients/skolkovo.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img src="/wp-content/themes/storefront-child/svg/clients/vtb.svg" alt="">
                </div>
                <div class="col-md-2">
                    <img src="/wp-content/themes/storefront-child/svg/clients/forex.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img src="/wp-content/themes/storefront-child/svg/clients/enel.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="container">
            <h2 class="heading">Обсудить сотрудничество</h2>
            <form action="#" class="feedback__form">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="Имя Фамилия Отчество">
                        <input type="tel" name="phone" placeholder="Мобильный телефон">
                        <input type="email" name="email" placeholder="Электронная почта">
                        <div class="feedback__form-group">
                            <input type="checkbox" name="" id="check">
                            <label for="check">
                                Я принимаю условия <a href="#">передачи данных</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <textarea name="message" placeholder="Ваше сообщение"></textarea>
                        <button class="feedback__form-btn btn-primary">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


<?php get_footer(); ?>