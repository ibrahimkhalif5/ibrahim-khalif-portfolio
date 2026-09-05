<?php

return [
    'personal' => [
        'name' => 'Ibrahim Khalif Ali',
        'short_name' => 'Ibrahim',
        'email' => 'ibrahimkhalif5@gmail.com',
        'tagline' => 'I build software systems that solve real world problems.',
        'role_line' => 'Software Engineer · ICT Professional',
        'hero_focus' => [
            ['icon' => 'code', 'label' => 'Production Systems', 'detail' => 'Revenue, healthcare, land registry, municipal'],
            ['icon' => 'graduation', 'label' => 'Software Engineering with AI', 'detail' => 'Centennial College, Canada'],
            ['icon' => 'map', 'label' => 'Based in Toronto', 'detail' => 'Open to Canadian opportunities'],
        ],
        'summary' => "I've spent my career designing, building, and supporting software systems that run real organizations, county revenue platforms, hospital systems, land registries, and government web platforms. Now I'm deepening that foundation into modern software engineering and AI.",
        'about_intro' => "I'm an ICT professional and software developer based in Toronto, currently studying Software Engineering with AI at Centennial College. I design, develop, deploy, and support software systems, mostly backend heavy web applications that need to work reliably in production.",
        'about_detail' => "Most of my work has been in the public and institutional space: government technology systems, revenue platforms, land registry tools, healthcare systems, and municipal websites. These are environments where the software has to handle real data, real users, and real consequences. That's where I learned to build things properly, not just get them running, but keep them running.",
        'about_paragraph3' => "Over the past few years, my focus has shifted from maintaining existing systems toward building new ones with modern tools and practices. I work extensively with Laravel, Vue.js, PHP, Python, and MySQL, and I've been deepening my understanding of software architecture, API design, and cloud deployment. More recently, I've been exploring how artificial intelligence can be integrated into practical applications, not as a buzzword, but as a genuine tool for solving problems.",
        'about_paragraph4' => "I'm drawn to software engineering because it rewards both discipline and curiosity. I want to build systems that are well designed, maintainable, and actually useful, the kind of software that makes an organization run better, not just look modern.",
        'resume_url' => 'Ibrahim-Khalif-Ali-Resume.pdf',
        'resume_label' => 'Résumé',
        'open_to' => [
            'Software Engineer',
            'Backend Developer',
            'Full Stack Developer',
            'AI / ML Roles',
            'Junior Software Engineering Roles',
        ],
        'interests' => [
            'Software Engineering',
            'Artificial Intelligence',
            'Full Stack Development',
            'Backend APIs',
            'Database Architecture',
            'Cloud Deployment',
        ],
    ],

    'seo' => [
        'title' => 'Ibrahim Khalif Ali | Software Engineer & AI Student',
        'description' => 'Ibrahim Khalif Ali is a software engineer and ICT professional specializing in full stack development, Laravel, Vue.js, Python, databases and modern software engineering, currently studying Software Engineering with AI at Centennial College.',
        // TODO: Replace with the production domain, e.g. https://yourdomain.com
        'canonical' => 'https://yourdomain.com',
        'og_image' => '/images/og-cover.png',
        'twitter_handle' => '',
        'site_name' => 'Ibrahim Khalif Ali',
    ],

    'nav' => [
        ['label' => 'About', 'id' => 'about'],
        ['label' => 'Experience', 'id' => 'experience'],
        ['label' => 'Education', 'id' => 'education'],
        ['label' => 'Skills', 'id' => 'skills'],
        ['label' => 'Projects', 'id' => 'projects'],
        ['label' => 'Exploring', 'id' => 'exploring'],
        ['label' => 'Contact', 'id' => 'contact'],
    ],

    'social' => [
        'github' => 'https://github.com/ibrahimkhalif5',
        'linkedin' => 'https://www.linkedin.com/in/ibrahim-khalif-367140161',
        'email' => 'mailto:ibrahimkhalif5@gmail.com',
    ],

    'contact' => [
        'headline' => "Let's build something useful.",
        'description' => "I'm a software engineer with real production experience in revenue, healthcare, and government systems, and I'm currently studying Software Engineering with AI. I'm open to software engineering, backend, full stack, and AI focused roles, as well as collaborative projects building practical systems that solve real world problems.",
        'cta_text' => 'Get In Touch',
    ],

    'experience' => [
        'lead' => "Production software that runs real organizations. My experience spans the design, development, and operation of systems relied on daily by public institutions, where correctness, reliability, and security are non negotiable.",
        'items' => [

            [
                'role' => 'Chief ICT Officer',
                'company' => 'Mandera County Government',
                'department' => 'Department of Revenue Services',
                'period' => null,
                'bullets' => [
                    'Managed and supported county wide ICT systems, ensuring reliability across revenue collection, land registry, and municipal operations',
                    'Designed and developed revenue management systems using Laravel and Vue.js to streamline tax collection and reporting',
                    'Deployed and configured POS terminals for revenue collection points, integrating M-Pesa and USSD payment channels',
                    'Administered databases and applications, managing MySQL instances serving government operations',
                    'Built and maintained government web platforms for internal operations and public facing services',
                    'Provided technical support, user training, and troubleshooting for county staff across departments',
                    'Integrated third party payment systems and REST APIs to connect revenue operations with financial infrastructure',
                ],
                'technologies' => ['Laravel', 'Vue.js', 'PHP', 'MySQL', 'JavaScript', 'REST APIs', 'M-Pesa Integration', 'USSD', 'POS Systems', 'Cloud Deployment'],
            ],
        ],
    ],

    'education' => [
        [
            'institution' => 'Centennial College',
            'program' => 'Software Engineering with AI',
            'location' => 'Toronto, Canada',
            'period' => null,
            'status' => 'Current student',
            'description' => 'Studying software engineering principles, artificial intelligence, and modern development practices.',
        ],
        [
            'institution' => 'INTI International University',
            'program' => 'Master of Information Technology',
            'location' => 'Malaysia',
            'period' => null,
            'status' => 'Currently completing final semester',
            'description' => 'Completing final semester through online learning.',
        ],
        [
            'institution' => "Murang'a University of Technology",
            'program' => 'Bachelor of Science in Information Technology',
            'location' => 'Kenya',
            'period' => '2018',
            'status' => null,
            'description' => null,
        ],
    ],

    'skills' => [
        'categories' => [
            [
                'name' => 'Languages',
                'skills' => [
                    ['name' => 'PHP', 'url' => null],
                    ['name' => 'JavaScript', 'url' => null],
                    ['name' => 'TypeScript', 'url' => null],
                    ['name' => 'Python', 'url' => 'https://python.org'],
                    ['name' => 'SQL', 'url' => null],
                    ['name' => 'HTML', 'url' => null],
                    ['name' => 'CSS', 'url' => null],
                ],
            ],
            [
                'name' => 'Frameworks',
                'skills' => [
                    ['name' => 'Laravel', 'url' => 'https://laravel.com'],
                    ['name' => 'Vue.js', 'url' => 'https://vuejs.org'],
                    ['name' => 'Django', 'url' => 'https://djangoproject.com'],
                    ['name' => 'React', 'url' => 'https://react.dev'],
                    ['name' => 'Next.js', 'url' => 'https://nextjs.org'],
                ],
            ],
            [
                'name' => 'Databases',
                'skills' => [
                    ['name' => 'MySQL', 'url' => null],
                    ['name' => 'SQLite', 'url' => null],
                ],
            ],
            [
                'name' => 'APIs & Backend',
                'skills' => [
                    ['name' => 'REST APIs', 'url' => null],
                    ['name' => 'Axios', 'url' => null],
                    ['name' => 'Laravel API', 'url' => null],
                    ['name' => 'Django REST Framework', 'url' => null],
                    ['name' => 'M-Pesa Integrations', 'url' => null],
                    ['name' => 'USSD Integrations', 'url' => null],
                ],
            ],
            [
                'name' => 'Tools & Platforms',
                'skills' => [
                    ['name' => 'Git', 'url' => 'https://git-scm.com'],
                    ['name' => 'GitHub', 'url' => 'https://github.com'],
                    ['name' => 'Linux', 'url' => null],
                    ['name' => 'Cloud Hosting', 'url' => null],
                    ['name' => 'POS Systems', 'url' => null],
                ],
            ],
            [
                'name' => 'Other',
                'skills' => [
                    ['name' => 'Power BI', 'url' => null],
                    ['name' => 'AI / ML Fundamentals', 'url' => null],
                    ['name' => 'Software Engineering', 'url' => null],
                    ['name' => 'System Administration', 'url' => null],
                ],
            ],
        ],
    ],

    'exploring' => [
        'intro' => "I already have real world software development experience, and I am now deliberately expanding into modern software engineering and AI. This is where my focus is right now.",
        'areas' => [
            [
                'title' => 'Artificial Intelligence',
                'icon' => 'brain',
                'description' => 'Currently studying Software Engineering with AI and developing a stronger understanding of intelligent systems.',
                'items' => [
                    'Artificial intelligence',
                    'Machine learning concepts',
                    'AI enabled applications',
                    'Intelligent software systems',
                    'Data driven applications',
                ],
            ],
            [
                'title' => 'Modern Software Engineering',
                'icon' => 'code',
                'description' => 'Strengthening skills in modern frameworks, languages, and development practices.',
                'items' => [
                    'Python',
                    'Django',
                    'REST APIs',
                    'TypeScript',
                    'React',
                    'Next.js',
                    'Cloud based development',
                    'Software architecture',
                ],
            ],
            [
                'title' => 'Backend Engineering',
                'icon' => 'server',
                'description' => 'Continuing to build deep expertise in the stack that powers production systems.',
                'items' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'REST APIs',
                    'Authentication',
                    'Database design',
                    'Enterprise systems',
                ],
            ],
        ],
    ],

    'projects' => [
        'lead' => "These are production systems built for real organizations, not tutorials. They process real payments, manage real records, and serve real users daily. The featured projects below are live systems I designed, built, and deployed as part of professional ICT and government work.",
        'items' => [
            [
                'title' => 'Elwak Municipality Website',
                'description' => 'A municipal government website designed to provide public information and digital access to municipal services and information for the Elwak community.',
                'category' => 'Government / Municipal',
                'technologies' => ['PHP', 'HTML/CSS', 'JavaScript', 'MySQL'],
                'url' => 'https://elwakmunicipality.co.ke/',
                'github' => null,
                'featured' => true,
                'screenshot' => null,
            ],
            [
                'title' => 'Mandera Assembly Website',
                'description' => 'Official web platform for Mandera County Assembly, providing public access to assembly information, proceedings, and governance resources.',
                'category' => 'Government / Public Sector',
                'technologies' => ['PHP', 'HTML/CSS', 'JavaScript', 'MySQL'],
                'url' => 'https://manderaassembly.go.ke/',
                'github' => null,
                'featured' => true,
                'screenshot' => null,
            ],
            [
                'title' => 'Najdah Organization Website',
                'description' => 'A multilingual organizational website supporting Arabic, English, and Turkish, built to serve a diverse international audience with content in multiple languages.',
                'category' => 'Web Development / Multilingual Platform',
                'technologies' => ['PHP', 'JavaScript', 'HTML/CSS', 'MySQL'],
                'url' => 'https://najdah.org/',
                'github' => null,
                'featured' => true,
                'screenshot' => null,
            ],
            [
                'title' => 'Mandera Revenue Collection Management System',
                'description' => 'A revenue management platform used for county revenue operations. Developed and supported as part of county ICT infrastructure, handling payment processing, POS integration, USSD channels, and comprehensive financial reporting.',
                'category' => 'Government / Revenue Technology',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'M-Pesa', 'USSD', 'POS', 'REST APIs', 'Reporting'],
                'url' => 'https://manderarcms.co.ke/login',
                'github' => null,
                'featured' => true,
                'screenshot' => null,
            ],
            [
                'title' => 'Mandera Land Registry System',
                'description' => 'A land registry management system designed to support land records and related administrative processes. Built to digitize and streamline property registration and ownership tracking.',
                'category' => 'Government / Land Management',
                'technologies' => ['Laravel', 'MySQL', 'PHP', 'JavaScript'],
                'url' => 'https://manderalrds.co.ke/',
                'github' => null,
                'featured' => true,
                'screenshot' => null,
            ],
            [
                'title' => 'Teno Care Hospital System',
                'description' => 'A hospital management system designed for a Level 3 hospital. Covers core operational modules including payments, triage, pharmacy, laboratory, radiology, and reporting, built to support clinical workflows and patient care operations.',
                'category' => 'Healthcare / Enterprise Software',
                'technologies' => ['PHP', 'MySQL', 'JavaScript', 'HTML/CSS'],
                'url' => null,
                'github' => null,
                'featured' => false,
                'screenshot' => null,
            ],
        ],
    ],
];
