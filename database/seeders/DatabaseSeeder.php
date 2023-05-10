<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Vp;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $vps = [
            'Urbanization',
            'Procurement',
            'Global Enterprise Services',
            'Fiscal',
            'Human Resources',
            'Institutional sales',
            'Distribution Chanels',
            'Planning',
            'Operations',
            'Country President',
            'Communication, Public Affairs & Sustainability',
            'Legal',
            'IT & Processes',
            'Non Cement Business',
            'BSO',
        ];
        foreach ($vps as $vp) {
            Vp::create([
                'vp_name' => $vp
            ]);
        }
        $areas = [
            [1, 'Urbanization Solutions',],
            [2, 'Procurement',],
            [3, 'Management & Financial Services',],
            [4, 'Fiscal',],
            [3, 'Operational Support',],
            [5, 'Human Resources in Plant',],
            [3, 'Transactional Services',],
            [6, 'Contractors Sales',],
            [7, 'Logistics & Warehouses',],
            [3, 'Commercial Support',],
            [8, 'Strategic Planning',],
            [9, 'VP Operations',],
            [5, 'Human Resources Operations',],
            [7, 'Retailing in Upper Egypt',],
            [7, 'Customer Experience',],
            [7, 'Retailing in Lower Egypt',],
            [7, 'Distribution Channels VP',],
            [8, 'Pricing Office',],
            [5, 'General Services',],
            [5, 'Security',],
            [10, 'Country President',],
            [5, 'Health Safety & Environment',],
            [5, 'Human Resources VP',],
            [11, 'Communication & Public Affairs',],
            [6, 'Government and Transformers ',],
            [12, 'Legal',],
            [3, 'Farm',],
            [6, 'Institutional sales VP',],
            [6, 'Ready-Mix Operations',],
            [6, 'Quality Control',],
            [6, 'Ready Mix Maintenance',],
            [9, 'Affiliated Cement Operations  (Paper Bags Factory)',],
            [9, 'Cement Mills & Customers Services',],
            [9, 'Raw Mills & Kilns',],
            [9, 'Electrical Maintenance',],
            [9, 'Instrumentation Maintenance',],
            [9, 'Maintenance of Transport',],
            [9, 'Mechanical Maintenance',],
            [9, 'Maintenance Planning & Administration',],
            [9, 'Quarries',],
            [9, 'Operations Process',],
            [9, 'Projects & Innovation',],
            [11, 'Sustainability',],
            [13, 'IT & Processes',],
            [1, 'Pavement',],
            [14, 'Non Cement Business',],
            [7, 'Marketing',],
            [3, 'Internal Control',],
            [7, 'Supply Chain - Dispatch & Scales',],
            [7, 'Supply Chain - Comm. Admin.',],
            [7, 'Supply Chain Haulers & Bulk Fleet',],
            [7, 'Sales',],
            [5, 'Medical',],
            [5, 'Medical (Cairo)',],
            [1, 'RM Operations',],
            [6, 'Maintenance',],
            [1, 'Addiditves ',],
            [2, 'Warehouses',],
            [14, 'Administration',],
            [2, 'Sport City',],
            [14, 'Hotel',],
            [14, 'Social Events Restaurant',],
            [14, 'Sports Activities',],
            [14, 'S.Pool & Cabines',],
            [14, 'Villas',],
            [9, 'Internal Transportation',],
            [9, 'Off Road Maintenance',],
            [9, 'On Road Maintenance',],
            [9, 'Packing',],
            [9, 'Process (Alternative Fuel)',],
            [5, 'HSE',],
            [6, 'Customer Service',],
            [8, 'Planning',],
            [9, 'New Talent',],
            [9, 'Kilns Area',],
            [7, 'Supply Chain - Haulers',],
            [7, 'Supply Chain - Bulk Fleet',],
            [9, 'Process (Alternative Fuel Remote Sites)',],
            [2, 'Sport City & Farm',],
            [7, 'Warehouses Logistics',],
        ];
        foreach ($areas as $area) {
            Area::create([
                'area_name' => $area[1],
                'vp_id' => $area[0],
            ]);
        }
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
        ]);

    }
}
