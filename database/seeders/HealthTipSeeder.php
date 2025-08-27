<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HealthTip;
use App\Models\User;

class HealthTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create an admin user for authoring tips
        $admin = User::where('role', 'admin')->first();
        if (!$admin) {
            $admin = User::first(); // Fallback to first user
        }

        $tips = [
            [
                'title' => 'Stay Hydrated for Better Health',
                'content' => 'Drinking adequate water is essential for maintaining good health. Aim for 8-10 glasses of water daily to support digestion, circulation, and overall bodily functions.',
                'category' => 'general',
                'priority' => 10,
                'tags' => ['hydration', 'water', 'health', 'wellness'],
                'is_active' => true,
            ],
            [
                'title' => 'Balanced Nutrition for Optimal Health',
                'content' => 'A balanced diet rich in fruits, vegetables, lean proteins, and whole grains provides essential nutrients for your body. Include a variety of colorful foods to ensure you get all necessary vitamins and minerals.',
                'category' => 'nutrition',
                'priority' => 9,
                'tags' => ['nutrition', 'diet', 'fruits', 'vegetables', 'proteins'],
                'is_active' => true,
            ],
            [
                'title' => 'Regular Exercise Benefits',
                'content' => 'Regular physical activity helps maintain a healthy weight, strengthens muscles and bones, improves mood, and reduces the risk of chronic diseases. Aim for at least 150 minutes of moderate exercise weekly.',
                'category' => 'exercise',
                'priority' => 9,
                'tags' => ['exercise', 'fitness', 'health', 'wellness'],
                'is_active' => true,
            ],
            [
                'title' => 'Mental Health Awareness',
                'content' => 'Mental health is as important as physical health. Practice stress management techniques, maintain social connections, and seek professional help when needed. Remember, it\'s okay to not be okay.',
                'category' => 'mental-health',
                'priority' => 8,
                'tags' => ['mental-health', 'stress', 'wellness', 'awareness'],
                'is_active' => true,
            ],
            [
                'title' => 'Preventive Healthcare',
                'content' => 'Regular check-ups and screenings can detect health issues early when they\'re most treatable. Don\'t skip your annual physical exams and recommended screenings based on your age and risk factors.',
                'category' => 'prevention',
                'priority' => 8,
                'tags' => ['prevention', 'check-ups', 'screenings', 'healthcare'],
                'is_active' => true,
            ],
            [
                'title' => 'Quality Sleep for Recovery',
                'content' => 'Getting 7-9 hours of quality sleep each night is crucial for physical and mental recovery. Establish a regular sleep schedule and create a relaxing bedtime routine for better sleep quality.',
                'category' => 'general',
                'priority' => 7,
                'tags' => ['sleep', 'recovery', 'wellness', 'routine'],
                'is_active' => true,
            ],
            [
                'title' => 'Heart-Healthy Habits',
                'content' => 'Maintain heart health by eating a low-sodium diet, exercising regularly, managing stress, avoiding smoking, and limiting alcohol consumption. These habits significantly reduce the risk of cardiovascular disease.',
                'category' => 'prevention',
                'priority' => 9,
                'tags' => ['heart-health', 'cardiovascular', 'prevention', 'lifestyle'],
                'is_active' => true,
            ],
            [
                'title' => 'Managing Chronic Conditions',
                'content' => 'If you have a chronic health condition, work closely with your healthcare team to develop a management plan. Take medications as prescribed, monitor symptoms, and attend regular follow-up appointments.',
                'category' => 'treatment',
                'priority' => 7,
                'tags' => ['chronic-conditions', 'management', 'treatment', 'healthcare'],
                'is_active' => true,
            ],
            [
                'title' => 'Sun Safety and Skin Protection',
                'content' => 'Protect your skin from harmful UV rays by wearing sunscreen with SPF 30+, seeking shade during peak sun hours, wearing protective clothing, and avoiding tanning beds to reduce skin cancer risk.',
                'category' => 'prevention',
                'priority' => 6,
                'tags' => ['sun-safety', 'skin-protection', 'cancer-prevention', 'UV-protection'],
                'is_active' => true,
            ],
            [
                'title' => 'Building Strong Relationships',
                'content' => 'Strong social connections contribute to better mental and physical health. Nurture relationships with family and friends, join community groups, and practice active listening and empathy.',
                'category' => 'mental-health',
                'priority' => 6,
                'tags' => ['relationships', 'social-connections', 'mental-health', 'community'],
                'is_active' => true,
            ],
        ];

        foreach ($tips as $tip) {
            HealthTip::create([
                'title' => $tip['title'],
                'content' => $tip['content'],
                'category' => $tip['category'],
                'priority' => $tip['priority'],
                'author_id' => $admin->id,
                'tags' => $tip['tags'],
                'is_active' => $tip['is_active'],
            ]);
        }
    }
}
