import React from 'react';
import { Link, useLocation } from 'react-router-dom';

const Sidebar: React.FC = () => {
  const location = useLocation();

  const menuItems = [
    { path: '/dashboard', icon: '📊', label: 'Dashboard' },
    { path: '/files', icon: '📁', label: 'Files' },
    { path: '/messages', icon: '💬', label: 'Messages' },
    { path: '/tasks', icon: '✓', label: 'Tasks' },
    { path: '/meetings', icon: '📅', label: 'Meetings' },
    { path: '/settings', icon: '⚙️', label: 'Settings' },
  ];

  const isActive = (path: string) => location.pathname === path;

  return (
    <aside className="hidden md:flex md:flex-col w-64 bg-gray-900 text-white min-h-screen">
      {/* Logo */}
      <div className="p-6 border-b border-gray-800">
        <h1 className="text-2xl font-bold">IHH CRM</h1>
      </div>

      {/* Navigation */}
      <nav className="flex-1 p-4">
        <ul className="space-y-2">
          {menuItems.map((item) => (
            <li key={item.path}>
              <Link
                to={item.path}
                className={`flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors ${
                  isActive(item.path)
                    ? 'bg-blue-600 text-white'
                    : 'text-gray-300 hover:bg-gray-800 hover:text-white'
                }`}
              >
                <span className="text-xl">{item.icon}</span>
                <span>{item.label}</span>
              </Link>
            </li>
          ))}
        </ul>
      </nav>

      {/* Footer */}
      <div className="p-4 border-t border-gray-800">
        <p className="text-xs text-gray-500 text-center">IHH CRM v1.0.0</p>
      </div>
    </aside>
  );
};

export default Sidebar;
