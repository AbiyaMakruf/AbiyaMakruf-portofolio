<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Clear prepared statements to avoid "cached plan must not change result type" error
        try {
            DB::statement('DEALLOCATE ALL');
        } catch (\Exception $e) {
            // Ignore if not supported or fails
        }
        
        DB::reconnect();
        $this->seedProjects();
        $this->seedSkills();
        $this->seedCareer();
    }

    protected function seedProjects(): void
    {
        $projects = [
            [
                'title' => 'Tarkam Football Analytics',
                'slug' => 'tarkam-football-analytics',
                'short_description' => 'Computer vision pipeline for player detection, tracking, and match analytics for amateur football.',
                'full_description' => 'Built an end-to-end vision pipeline to detect and track players from match footage, generating heatmaps, trajectories, and spatial activity visualizations to surface per-player insights.',
                'category' => 'AI',
                'tech_stack' => ['Python', 'OpenCV', 'YOLOv8', 'DeepSORT', 'Docker'],
                'github_url' => null,
                'thumbnail_path' => null,
                'status' => 'published',
            ],
            [
                'title' => 'Fashion Retail Sales Analytics',
                'slug' => 'fashion-retail-sales-analytics',
                'short_description' => 'Power BI dashboards to analyze and visualize sales performance for a fashion retail client.',
                'full_description' => 'Designed interactive Power BI dashboards to monitor sales KPIs, visualize trends, and surface actionable insights for retail stakeholders.',
                'category' => 'Data Analytics',
                'tech_stack' => ['Power BI', 'SQL', 'DAX'],
                'github_url' => null,
                'thumbnail_path' => null,
                'status' => 'published',
            ],
            [
                'title' => 'Asset Management Dashboards',
                'slug' => 'asset-management-dashboards',
                'short_description' => 'Interactive dashboards and trackers for fixed-asset management and reconciliation.',
                'full_description' => 'Delivered dashboards to manage and reconcile asset data between FAMS and SAP, including a real-time asset movement tracker for operational visibility.',
                'category' => 'Analytics',
                'tech_stack' => ['Power BI', 'SQL', 'Excel'],
                'github_url' => null,
                'thumbnail_path' => null,
                'status' => 'published',
            ],
            [
                'title' => 'Solar Panel Detection',
                'slug' => 'solar-panel-detection',
                'short_description' => 'Deep learning for detecting solar panels from Sentinel-2 satellite imagery.',
                'full_description' => 'Contributed to a machine learning project to detect and mask solar panels using 13-band Sentinel-2 satellite imagery, improving detection accuracy with computer vision techniques.',
                'category' => 'AI',
                'tech_stack' => ['Python', 'PyTorch', 'Satellite Imagery', 'Computer Vision'],
                'github_url' => null,
                'thumbnail_path' => null,
                'status' => 'published',
            ],
            [
                'title' => 'F2WL Event Platform',
                'slug' => 'f2wl-event-platform',
                'short_description' => 'Full-stack web platform and online store for F2WL events and tournaments.',
                'full_description' => 'Developed and maintained full-stack websites for F2WL events, covering the main site, tournament platform, and integrated online store.',
                'category' => 'Web',
                'tech_stack' => ['Laravel', 'MySQL', 'Blade', 'TailwindCSS'],
                'github_url' => null,
                'thumbnail_path' => null,
                'status' => 'published',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }

    protected function seedSkills(): void
    {
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'PHP', 'category' => 'Backend', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'MySQL', 'category' => 'Backend', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'Python', 'category' => 'Data & AI', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'Computer Vision', 'category' => 'Data & AI', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'Deep Learning', 'category' => 'Data & AI', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'Power BI', 'category' => 'Data Analytics', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'SQL', 'category' => 'Data Analytics', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'Docker', 'category' => 'Cloud & DevOps', 'level' => 'Intermediate', 'icon_path' => null],
            ['name' => 'Git', 'category' => 'Cloud & DevOps', 'level' => 'Advanced', 'icon_path' => null],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 'Intermediate', 'icon_path' => null],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'level' => 'Intermediate', 'icon_path' => null],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name'], 'category' => $skill['category']],
                $skill
            );
        }
    }

    protected function seedCareer(): void
    {
        $experiences = [
            [
                'company' => 'Freelance',
                'role' => 'Data & Computer Vision Engineer',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2025-01-01',
                'end_date' => '2025-09-30',
                'description' => 'Built computer vision pipelines for player detection/tracking and delivered Power BI dashboards for retail analytics.',
                'category' => 'Professional',
                'highlights' => [
                    'Developed player detection/tracking with heatmaps and trajectories.',
                    'Delivered retail sales analytics dashboards in Power BI.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1521417531039-96c46e5d12aa?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => 'PT Toyota Astra Motor',
                'role' => 'Intern - Data Analytics',
                'location' => 'Jakarta, Indonesia',
                'start_date' => '2024-08-01',
                'end_date' => '2024-09-30',
                'description' => 'Developed interactive dashboards for fixed-asset management and reconciliation, plus a real-time asset movement tracker.',
                'category' => 'Professional',
                'highlights' => [
                    'Built dashboards for fixed-asset management and reconciliation between FAMS and SAP.',
                    'Created a real-time asset movement tracker for operational visibility.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => 'Solafune Inc.',
                'role' => 'Research Internship',
                'location' => 'Tokyo, Japan (Remote)',
                'start_date' => '2024-04-01',
                'end_date' => '2024-06-30',
                'description' => 'Contributed to solar panel detection from Sentinel-2 imagery using deep learning and image processing.',
                'category' => 'Professional',
                'highlights' => [
                    'Improved solar panel detection on 13-band Sentinel-2 imagery.',
                    'Applied deep learning and image processing to boost accuracy.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => 'Event Horizon',
                'role' => 'Full Stack Developer',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2020-07-01',
                'end_date' => '2022-07-31',
                'description' => 'Built and maintained full-stack web platforms for F2WL events, tournament system, and online store.',
                'category' => 'Professional',
                'highlights' => [
                    'Delivered event sites, tournament platform, and online store for F2WL.',
                    'Maintained full-stack features across Laravel and modern frontend.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => 'Telkom University',
                'role' => 'Assistant Lecturer',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2022-09-01',
                'end_date' => '2025-05-31',
                'description' => 'Assistant lecturer for calculus, data structures, software engineering, OOP, and platform-based application development.',
                'category' => 'Academic',
                'highlights' => [
                    'Assisted courses in Calculus, Advanced Calculus, Data Structures, Software Engineering, OOP, and PBAD.',
                    'Supported cohorts across multiple academic years with lab and tutorial guidance.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => 'Telkom University',
                'role' => 'Assistant Practicum - Informatics Laboratory',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2022-09-01',
                'end_date' => '2025-05-31',
                'description' => 'Practicum assistant for Programming Algorithms, Data Structures, Computer Networks, OOP, and AI fundamentals.',
                'category' => 'Academic',
                'highlights' => [
                    'Guided students through programming algorithms, data structures, computer networks, OOP, and AI fundamentals.',
                    'Prepared lab materials and supported assessments.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => 'Bangkit 2024 Cohort',
                'role' => 'Machine Learning Path',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2024-02-01',
                'end_date' => '2024-06-30',
                'description' => 'Completed the Bangkit 2024 Machine Learning path with distinction and capstone collaboration with Solafune Inc.',
                'category' => 'Program',
                'highlights' => [
                    'Graduated with distinction in the ML path.',
                    'Selected for Capstone Company Path collaborating with Solafune Inc.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => '3rd International Conference (ICOSEIT)',
                'role' => 'Volunteer - Editorial & Event Team',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2025-09-01',
                'end_date' => '2025-10-31',
                'description' => 'Volunteer supporting editorial and event execution for ICOSEIT with focus on content quality and session facilitation.',
                'category' => 'Organizational',
                'highlights' => [
                    'Proofread and formatted conference materials to maintain consistency.',
                    'Co-hosted sessions and guided participants during onsite presentations.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1503428593586-e225b39bddfe?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'company' => '13th International Conference (ICOICT)',
                'role' => 'Volunteer - Program & Editorial Team',
                'location' => 'Bandung, Indonesia',
                'start_date' => '2025-07-01',
                'end_date' => '2025-07-31',
                'description' => 'Volunteer assisting program management and editorial quality for ICOICT 2025.',
                'category' => 'Organizational',
                'highlights' => [
                    'Assisted program team in managing conference sessions.',
                    'Proofread and formatted materials to ensure quality and consistency.',
                ],
                'gallery' => [
                    'https://images.unsplash.com/photo-1531297484001-80022131f5a1?auto=format&fit=crop&w=900&q=80',
                ],
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::updateOrCreate(
                ['company' => $experience['company'], 'role' => $experience['role']],
                array_merge($experience, [
                    'slug' => Str::slug($experience['company'] . '-' . $experience['role']),
                ])
            );
        }

        $educations = [
            [
                'institution' => 'Telkom University',
                'degree' => 'Master of Informatics',
                'major' => 'Informatics',
                'start_date' => '2024-09-01',
                'end_date' => '2026-05-31',
                'description' => 'Master\'s student with GPA 3.94/4.00; research and publications in computer vision and AI.',
            ],
            [
                'institution' => 'Telkom University',
                'degree' => 'Bachelor of Informatics',
                'major' => 'Informatics',
                'start_date' => '2021-09-01',
                'end_date' => '2024-07-31',
                'description' => 'Graduated with GPA 3.96/4.00; published conference paper and contributed to multiple academic programs.',
            ],
            [
                'institution' => 'SMA Negeri 2 Bandung',
                'degree' => 'Senior High School',
                'major' => 'Science',
                'start_date' => '2018-07-01',
                'end_date' => '2021-06-30',
                'description' => 'Graduated with top school exam score.',
            ],
        ];

        foreach ($educations as $education) {
            Education::updateOrCreate(
                ['institution' => $education['institution'], 'degree' => $education['degree']],
                $education
            );
        }
    }

}
