<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Team_Members_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'team-members';
    }

    public function get_title() {
        return esc_html__('Team Members', 'projukti-plus');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['basic'];
    }

    public function get_keywords() {
        return ['team', 'members', 'team members'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'projukti-plus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Image', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        
        $repeater->add_control(
            'member_title',
            [
                'label' => esc_html__('Title', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'member_email',
            [
                'label' => esc_html__('Email', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'email_icon',
            [
                'label' => esc_html__('Email icon', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $repeater->add_control(
            'member_experience',
            [
                'label' => esc_html__('Experience', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $repeater->add_control(
            'calender_icon',
            [
                'label' => esc_html__('Calender icon', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );


        $repeater->add_control(
            'member_description',
            [
                'label' => esc_html__('Description', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Members', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'projukti-plus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label' => esc_html__('Member Name Color', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-area .single-team-member .meta h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_title_color',
            [
                'label' => esc_html__('Member Title Color', 'projukti-plus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-area .single-team-member .meta p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Add more style controls as needed...

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        if (!empty($settings['team_members'])) {
            
            echo '<div class="team-member-wrapper">';

                foreach ($settings['team_members'] as $member) {
                    echo '<div class="single-team-member">';
                        echo '<div class="front">';
                            echo '<img src="' . $member['member_image']['url'] . '" alt="">';
                            echo '<div class="meta bg">';
                            
                                if (!empty($member['member_name'])) {
                                    echo '<h2>' . $member['member_name'] . '</h2>';
                                }
                                if (!empty($member['member_title'])) {
                                    echo '<p>' . $member['member_title'] . '</p>';
                                }
                            
                            echo '</div>';
                        echo '</div>';
                        
                        echo '<div class="hover">';
                            echo '<div class="meta">';
                            
                                if (!empty($member['member_name'])) {
                                    echo '<h2>' . $member['member_name'] . '</h2>';
                                }
                                if (!empty($member['member_title'])) {
                                    echo '<p>' . $member['member_title'] . '</p>';
                                }
                                
                                echo '<div class="envelope">';
                                    echo '<div class="envelpe-bg">';
                                
                                        // Retrieve the selected email icon
                                        $email_icon = $member['email_icon']; // Assuming the icon is stored in 'email_icon'

                                        // Output the selected email icon HTML
                                        if (!empty($email_icon['value'])) {
                                            echo '<i class="' . $email_icon['value'] . '"></i>';
                                        }

                                    echo '</div>';
                                    if (!empty($member['member_email'])) {
                                        echo '<div>' . $member['member_email'] . '</div>';
                                    }
                                echo '</div>';
                                
                                echo '<div class="calender">';
                                    echo '<div class="calender-bg">';

                                                                        
                                        // Retrieve the selected calender icon
                                        $calender_icon = $member['calender_icon']; // Assuming the icon is stored in 'email_icon'

                                        // Output the selected calender icon HTML
                                        if (!empty($calender_icon['value'])) {
                                            echo '<i class="' . $calender_icon['value'] . '"></i>';
                                        }

                                    echo '</div>';
                                    if (!empty($member['member_experience'])) {
                                        echo '<div>' . $member['member_experience'] . '</div>';
                                    }
                                echo '</div>';
                                
                                if (!empty($member['member_description'])) {
                                    echo '<p>' . $member['member_description'] . '</p>';
                                }
                            
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        }
    }
    
}

// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Team_Members_Widget());
